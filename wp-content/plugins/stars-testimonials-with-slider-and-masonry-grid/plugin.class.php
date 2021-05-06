<?php
/**
* Plugin Main Class
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$settingArray = [];
$colorStyleArray = [];
$fontFamily = [];
$proTestPluginURL = admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes&task=upgrade-to-pro");
define("PRO_PLUGIN_URL",$proTestPluginURL);
class Stars_Testimonials
{

	public $iframeCode;

    public $you_tube_url = "https://www.youtube.com/embed/L7IM7N-CGFk";

	function __construct()
		{
		$this->initializeValues();
		add_action( 'init', array($this, 'register_testimonials') );
		add_filter( 'post_updated_messages', array($this, 'testimonials_update_messages') );
		add_action( 'add_meta_boxes_stars_testimonial', array($this, 'adding_custom_meta_boxes') );
		add_action( 'save_post', array($this, 'save_testimonial' ) );
		add_action( 'admin_menu', array($this, 'add_all_short_codes_menu') );
		add_shortcode( 'stars_testimonials', array($this, 'render_stars_testimonials') );
		add_shortcode( 'testimonial_stars', array($this, 'render_testimonial_stars') );
		add_action( 'stars_testimonial_display_rating', array($this, 'display_rating'), 10, 1 );
		add_action( 'stars_testimonial_display_company', array($this, 'display_company'), 10, 2 );
		add_action( 'vc_before_init', array($this, 'testimonial_integrateWithVC'));
		add_filter( 'enter_title_here', array($this, 'change_placeholder_text'));
		add_action( 'admin_menu', array($this, 'remove_add_new_button_from_menu'));
		add_action('admin_enqueue_scripts', array($this, 'stars_testimonials_admin_styles'));
		add_action('admin_enqueue_scripts', array($this, 'stars_testimonials_admin_script'));

		add_action( 'wp_ajax_save_testimonial_setting', array( $this, 'save_testimonial_settings' ) );

		add_action( 'wp_ajax_remove_testimonial_record', array( $this, 'remove_testimonial_record' ) );

		add_action( 'wp_ajax_testimonial_pro_popup', array( $this, 'testimonial_pro_popup' ) );

		add_action( 'wp_ajax_save_premio_testimonial_post', array( $this, 'save_premio_testimonial_post' ));

		add_action( 'wp_ajax_update_premio_testimonial_post', array( $this, 'update_premio_testimonial_post' ));

		add_action('edit_form_top', array($this, 'stars_testimonials_edit_form_top'));
//		add_filter('views_edit-stars_testimonial', array($this, 'stars_testimonials_edit_list'));

		add_action('admin_init', array($this,  'plugin_redirect'));

		add_filter( 'plugin_action_links_' . TESTIMONIAL_PLUGIN_BASE, [ $this, 'plugin_action_links' ] );

		add_action( 'admin_footer', array( $this, 'admin_footer' ) );

		/* Send message to owner */
		add_action( 'wp_ajax_wcp_star_testimonial_send_message_to_owner', array( $this, 'wcp_star_testimonial_send_message_to_owner' ) );

        /* load language files */
        add_action( 'plugins_loaded', array( $this, 'plugin_text' ) );

        add_filter('manage_edit-stars_testimonial_columns', array($this, 'manage_testimonial_image_thead'), 99999);
        add_action('manage_stars_testimonial_posts_custom_column', array($this, 'manage_testimonial_image_content'), 2, 2);
        
        add_action('admin_init', array($this, 'testimonial_admin_init'));

        add_action('admin_footer', array($this, 'add_deactivate_modal'));
        add_action('wp_ajax_star_testimonials_plugin_deactivate', array($this, 'star_testimonials_plugin_deactivate'));

        add_action("wp_ajax_stars_testimonials_update_status", array($this, 'stars_testimonials_update_status'));
    }

    public function stars_testimonials_update_status() {
        if(!empty($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], 'stars_testimonials_update_status')) {
            $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            update_option("stars_testimonials_update_message", 2);
            if($status == 1) {
                $url = 'https://go.premio.io/api/update.php?email='.$email.'&plugin=stars_testimonials';
                $handle = curl_init();
                curl_setopt($handle, CURLOPT_URL, $url);
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($handle);
                curl_close($handle);
            }
        }
        echo "1"; exit;
    }

    public function add_deactivate_modal()
    {
        if (current_user_can('manage_options')) {
            global $pagenow;

            if ('plugins.php' !== $pagenow) {
                return;
            }

            include 'deactivate-form.php';
        }
    }

    /* star_testimonials_plugin_deactivate start */
    public function star_testimonials_plugin_deactivate()
    {
        if (current_user_can('manage_options')) {
            $postData = $_POST;
            $errorCounter = 0;
            $response = array();
            $response['status'] = 0;
            $response['message'] = "";
            $response['valid'] = 1;
            $reason = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_STRING);
            $nonce = filter_input(INPUT_POST, 'nonce', FILTER_SANITIZE_STRING);
            if (empty($reason)) {
                $errorCounter++;
                $response['message'] = "Please provide reason";
            } else if (empty($nonce)) {
                $response['message'] = esc_attr__("Your request is not valid", CHT_OPT);
                $errorCounter++;
                $response['valid'] = 0;
            } else {
                if (!wp_verify_nonce($nonce, 'star_testimonials_deactivate_nonce')) {
                    $response['message'] = esc_attr__("Your request is not valid", CHT_OPT);
                    $errorCounter++;
                    $response['valid'] = 0;
                }
            }
            if ($errorCounter == 0) {
                global $current_user;
                $email = "none@none.none";
                if (isset($postData['email_id']) && !empty($postData['email_id']) && filter_var($postData['email_id'], FILTER_VALIDATE_EMAIL)) {
                    $email = $postData['email_id'];
                }
                $domain = site_url();
                $user_name = $current_user->first_name . " " . $current_user->last_name;
                $subject = "Star Testimonials was removed from {$domain}";
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $headers .= 'From: ' . $user_name . ' <' . $email . '>' . PHP_EOL;
                $headers .= 'Reply-To: ' . $user_name . ' <' . $email . '>' . PHP_EOL;
                $headers .= 'X-Mailer: PHP/' . phpversion();
                ob_start();
                ?>
                <table border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <th>Plugin</th>
                        <td>Star Testimonials</td>
                    </tr>
                    <tr>
                        <th>Plugin Version</th>
                        <td><?php esc_attr_e(PREMIO_TESTIMONIAL_PLUGIN_VERSION) ?></td>
                    </tr>
                    <tr>
                        <th>Domain</th>
                        <td><?php echo esc_url($domain) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php esc_attr_e($email) ?></td>
                    </tr>
                    <tr>
                        <th>Reason</th>
                        <td><?php esc_attr_e(nl2br($reason)) ?></td>
                    </tr>
                    <tr>
                        <th>WordPress Version</th>
                        <td><?php esc_attr_e(get_bloginfo('version')) ?></td>
                    </tr>
                    <tr>
                        <th>PHP Version</th>
                        <td><?php esc_attr_e(PHP_VERSION) ?></td>
                    </tr>
                </table>
                <?php
                $content = ob_get_clean();
                $email_id = "gal@premio.io, karina@premio.io";
                wp_mail($email_id, $subject, $content, $headers);
                $response['status'] = 1;
            }
            echo json_encode($response);
            wp_die();
        }
    }

    public function save_premio_testimonial_post() {
        if (current_user_can('edit_posts')) {
            $response = array();
            $response['status'] = 0;
            $nonce = filter_input(INPUT_POST, 'nonce', FILTER_SANITIZE_STRING);
            if (!wp_verify_nonce($nonce, 'add_premio_testimonial_post')) {
                $response['message'] = "";
            } else {
                $post_title = filter_input(INPUT_POST, 'post_title', FILTER_SANITIZE_STRING);
                $testimonial_content = filter_input(INPUT_POST, 'testimonial_content');
                $company_name = filter_input(INPUT_POST, 'company_name', FILTER_SANITIZE_STRING);
                $website_link = filter_input(INPUT_POST, 'website_link', FILTER_SANITIZE_STRING);
                $client_image = filter_input(INPUT_POST, 'client_image', FILTER_SANITIZE_STRING);
                $testimonial_stars = filter_input(INPUT_POST, 'testimonial_stars', FILTER_SANITIZE_STRING);
                $testimonial_categories = isset($_REQUEST['testimonial_categories']) ? $_REQUEST['testimonial_categories'] : array();
                $user_id = get_current_user_id();

                if (empty($testimonial_categories) || !is_array($testimonial_categories)) {
                    $testimonial_categories = array();
                }

                if (!is_array($testimonial_categories)) {
                    $testimonial_categories = array();
                }
                $post_data = array(
                    'post_title' => $post_title,
                    'post_content' => $testimonial_content,
                    'post_status' => 'publish',
                    'post_author' => $user_id,
                    'post_category' => array(),
                    'post_type' => 'stars_testimonial'
                );

                // Lets insert the post now.
                $post_id = wp_insert_post($post_data);
                if (!empty($post_id)) {
                    if (!empty($testimonial_categories)) {
                        wp_set_post_terms($post_id, $testimonial_categories, 'stars_testimonial_cat', false);
                    }

                    add_post_meta($post_id, 'testimonial_company_name', $company_name);
                    add_post_meta($post_id, 'testimonial_company_url', $website_link);
                    add_post_meta($post_id, 'testimonial_stars', $testimonial_stars);
                    if (!empty($client_image)) {
                        set_post_thumbnail($post_id, $client_image);
                    }
                    $response['status'] = 1;
                }
            }
            echo json_encode($response);
            exit;
        }
    }

    public function update_premio_testimonial_post() {
        if (current_user_can('edit_posts')) {
            $response = array();
            $response['status'] = 0;
            $nonce = filter_input(INPUT_POST, 'nonce', FILTER_SANITIZE_STRING);
            $post_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
            if (!wp_verify_nonce($nonce, 'update_premio_testimonial_post_' . $post_id)) {
                $response['message'] = "Invalid request";
            } else {
                $post_title = filter_input(INPUT_POST, 'post_title', FILTER_SANITIZE_STRING);
                $testimonial_content = filter_input(INPUT_POST, 'testimonial_content');
                $company_name = filter_input(INPUT_POST, 'company_name', FILTER_SANITIZE_STRING);
                $website_link = filter_input(INPUT_POST, 'website_link', FILTER_SANITIZE_STRING);
                $client_image = filter_input(INPUT_POST, 'client_image', FILTER_SANITIZE_STRING);
                $testimonial_stars = filter_input(INPUT_POST, 'testimonial_stars', FILTER_SANITIZE_STRING);
                $testimonial_categories = isset($_REQUEST['testimonial_categories']) ? $_REQUEST['testimonial_categories'] : array();
                $user_id = get_current_user_id();

                if (empty($testimonial_categories) || !is_array($testimonial_categories)) {
                    $testimonial_categories = array();
                }

                if (!is_array($testimonial_categories)) {
                    $testimonial_categories = array();
                }
                $post_data = array(
                    'ID' => $post_id,
                    'post_title' => $post_title,
                    'post_content' => $testimonial_content,
                    'post_status' => 'publish',
                );

                // Lets insert the post now.
                $post_id = wp_update_post($post_data);
                if (!empty($post_id)) {
                    if (!empty($testimonial_categories)) {
                        wp_set_post_terms($post_id, $testimonial_categories, 'stars_testimonial_cat', false);
                    }

                    update_post_meta($post_id, 'testimonial_company_name', $company_name);
                    update_post_meta($post_id, 'testimonial_company_url', $website_link);
                    update_post_meta($post_id, 'testimonial_stars', $testimonial_stars);
                    if (!empty($client_image)) {
                        set_post_thumbnail($post_id, $client_image);
                    } else {
                        delete_post_thumbnail($post_id);
                    }
                    $response['status'] = 1;
                }
            }
            echo json_encode($response);
            exit;
        }
    }

    public function testimonial_admin_init() {
        global $typenow, $current_screen;
        $request_url = $_SERVER['REQUEST_URI'];
        if(strpos($request_url, "post-new.php?post_type=stars_testimonial") !== false) {
            wp_redirect(admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes&task=add-testimonial"));
            exit;
        }
        $action = isset($_REQUEST['action'])?$_REQUEST['action']:"";
        if($action == "edit") {
            $post_id = isset($_REQUEST['post'])?$_REQUEST['post']:"";
            if(!empty($post_id) && is_numeric($post_id) && $post_id > 0) {
                $post = get_post($post_id);
                if (isset($post->post_type) && $post->post_type == 'stars_testimonial') {
                    wp_redirect(admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes&task=update-testimonial&post=".$post_id));
                    exit;
                }
            }
        }

    }

    public function custom_bulk_action($bulk_actions) {
        $bulk_actions['move_to_folder'] = __( 'Move to Folder', 'email_to_eric');
        return $bulk_actions;
    }

    function manage_testimonial_image_content($column_name, $post_ID)
    {
        if($column_name == "testimonial_image") {
            $image_url = get_the_post_thumbnail_url($post_ID, 'thumbnail');
            if(!empty($image_url)) {
                echo "<img src='".$image_url."' class='testimonial-thumb' />";
            }
        }
    }

    function manage_testimonial_image_thead($defaults, $d = "")
    {
        if(isset($defaults['title'])) {
            $defaults['title'] = esc_attr__("Client's name", 'stars-testimonials');
        }
        $columns = $defaults + array(
            'testimonial_image' => esc_attr__("Client's image", 'stars-testimonials'),
        );
        return $columns;
    }

    public function plugin_text() {
        load_plugin_textdomain("stars-testimonials", FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
    }

	public function admin_footer() {
		global $typenow;
		if(is_admin()) {
			global $current_screen;
			if($typenow == "stars_testimonial" && 'edit' == ($current_screen->base || 'edit-tags' == $current_screen->base)) {
				include_once dirname(__FILE__). "/help.php";
			}
		}
	}



	public function wcp_star_testimonial_send_message_to_owner() {
		$response = array();
		$response['status'] = 0;
		$response['error'] = 0;
		$response['errors'] = array();
		$response['message'] = "";
		$errorArray = [];
		$errorMessage = __("%s is required", 'stars-testimonials');
		$postData = $_POST;
		if(!isset($postData['textarea_text']) || trim($postData['textarea_text']) == "") {
			$error = array(
				"key"   => "textarea_text",
				"message" => __("Please enter your message",'stars-testimonials')
			);
			$errorArray[] = $error;
		}
		if(!isset($postData['user_email']) || trim($postData['user_email']) == "") {
			$error = array(
				"key"   => "user_email",
				"message" => sprintf($errorMessage,__("Email",'stars-testimonials'))
			);
			$errorArray[] = $error;
		} else if(!filter_var($postData['user_email'], FILTER_VALIDATE_EMAIL)) {
			$error = array(
				'key' => "user_email",
				"message" => "Email is not valid"
			);
			$errorArray[] = $error;
		}
		if(empty($errorArray)) {
			if(!isset($postData['star_testimonial_help_nonce']) || trim($postData['star_testimonial_help_nonce']) == "") {
				$error = array(
					"key"   => "nonce",
					"message" => __("Your request is not valid", 'stars-testimonials')
				);
				$errorArray[] = $error;
			} else {
				if(!wp_verify_nonce($postData['star_testimonial_help_nonce'], 'star_testimonial_help_nonce')) {
					$error = array(
						"key"   => "nonce",
						"message" => __("Your request is not valid", 'stars-testimonials')
					);
					$errorArray[] = $error;
				}
			}
		}
		if(empty($errorArray)) {
			$text_message = self::sanitize_options($postData['textarea_text'], 'textarea');
			$email = self::sanitize_options($postData['user_email'],"email");
			$domain = site_url();

			global $current_user;

			$user_name = $current_user->first_name." ".$current_user->last_name;

			$subject = "Stars Testimonials request: ".$domain;
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8".PHP_EOL ;
			$headers .= 'From: '.$user_name.' <'.$email.'>'.PHP_EOL ;
			$headers .= 'Reply-To: '.$user_name.' <'.$email.'>'.PHP_EOL ;
			$headers .= 'X-Mailer: PHP/' . phpversion();
			ob_start();
			?>
			<table border="0" cellspacing="0" cellpadding="5">
				<tr>
					<th>Domain</th>
					<td><?php echo $domain ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $email ?></td>
				</tr>
				<tr>
					<th>Message</th>
					<td><?php echo nl2br($text_message) ?></td>
				</tr>
			</table>
			<?php
			$message = ob_get_clean();
			$to = "gal@premio.io, karina@premio.io";
			$status = wp_mail($to, $subject, $message, $headers);
			if($status) {
				$response['status'] = 1;
			} else {
				$response['status'] = 0;
				$response['message'] = "Not able to send mail";
			}
		} else {
			$response['error'] = 1;
			$response['errors'] = $errorArray;
		}
		echo json_encode($response);
	}

	public function plugin_action_links( $links ) {
		$links['go_pro'] = sprintf( '<a href="%1$s" style="color: #FF5983;font-weight: bold;" class="testimonial-plugins-gopro">%2$s</a>',admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes&task=upgrade-to-pro"), __( 'Upgrade', 'stars-testimonials' ) );
		return $links;
	}

	function plugin_redirect() {
		if (get_option('stars_testimonail_plugin_redirection', false)) {
			delete_option('stars_testimonail_plugin_redirection');
            $is_shown = get_option("stars_testimonials_update_message");
            if($is_shown === false) {
                wp_redirect("edit.php?post_type=stars_testimonial&page=all-shortcodes&task=mailjet");
                exit;
            } else {
                wp_redirect("edit.php?post_type=stars_testimonial");
                exit;
            }
		}
	}

	function stars_testimonials_edit_list($views) {
//		$screen = get_current_screen();
//		if( 'stars_testimonial' == $screen->post_type ) {
//			$this->setTestimonialMessage();
//		}
		return $views;
	}

	function setTestimonialMessage() {
		$totalPostStatus = $this->get_total_testimonials();
		if ($totalPostStatus) {
			echo $this->testimonialMessage();
		}
	}

	function testimonialButton() {
		$screen = get_current_screen();
		if($screen->post_type == "stars_testimonial") {
			return "<a href='".admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes&task=add-new")."' class='upgrade-block-button open-popup new-widget-button'>".__("+ New Widget Shortcode", 'stars-testimonials')."</a><a href='".PRO_PLUGIN_URL."' target='_blank' class='upgrade-block-button open-popup'>".__("Upgrade to Pro", 'stars-testimonials')."</a><div class='clear'></div>";
		} else {
			return "";
		}
	}

	function testimonialMessage() {
		return "<div class='testimonial-limit-msg'>".__("You have reached to maximum testimonial limit. Add more testimonials by <a href='".PRO_PLUGIN_URL."' target='_blank' class='upgrade-button open-popup'>Upgrading to Pro</a><div class='clear'></div>", 'stars-testimonials')."</div>";
	}

	function stars_testimonials_edit_form_top($post) {
		if( 'stars_testimonial' == $post->post_type ) {
			$this->setTestimonialMessage();
		}
	}

	function testimonial_pro_popup() {
		$page = "upgrade-to-pro.php";
		include_once $page;
	}

	function initializeValues() {
		$GLOBALS['settingArray'] = array(
			array(
				"title" => "Stars",
				"slug" 	=> "stars",
				"class" => "starrating",
				"color" => array("000000", "2980b9", "ca8e2f", "d9e835", "e0d733", "e5c534", "fecc1f", "ff0000", "ffd851", "ffffff","1cbfea")
			),
			array(
				"title" => "Text",
				"slug" => "text",
				"class" => "st-testimonial-content",
					"color" => array("000000", "111111", "2980b9", "333333", "666666", "707070", "a6a6a6", "bbbbbb", "bdc3c7", "ffffff","1cbfea")
			),
			array(
				"title" => "Background",
				"slug" => "background",
				"class" => "st-testimonial-bg",
				"color" => array("000000", "111111", "141414", "2980b9", "333333", "666666", "707070", "a6a6a6", "fafafa", "ffffff","1cbfea")
			),
			array(
				"title" => "Title",
				"slug" => "title",
				"class" => "st-testimonial-title",
				"color" => array("000000", "111111", "141414", "2980b9", "333333", "3c3c3c", "707070", "a6a6a6", "fafafa", "ffffff","1cbfea")
			),
			array(
				"title" => "Company",
				"slug" => "company",
				"class" => "st-testimonial-company",
				"color" => array("000000", "111111", "2980b9", "333333", "707070", "a6a6a6", "bbbbbb", "bdc3c7", "f4f4f4", "ffffff","1cbfea")
			)
		);
		$star 		= array("ff0000","fecc1f","ffd851","ffd851","ca8e2f","e0d733","e5c534","","","ffffff","","","","d9e835","","d9e835","d9e835");
		$text 		= array("333333","333333","333333","333333","ffffff","333333","333333","333333","333333","333333","333333","ffffff","ffffff","333333","ffffff","333333","ffffff");
		$background = array("ffffff","fafafa","fafafa","fafafa","","fafafa","ffffff","fafafa","fafafa","ffffff","fafafa","","","ffffff","141414","ffffff","ffffff");
		$title 		= array("333333","333333","333333","333333","ffffff","333333","ffffff","707070","707070","707070","707070","ffffff","ffffff","3c3c3c","333333","ffffff","ffffff");
		$company 	= array("333333","333333","333333","333333","ffffff","333333","f4f4f4","000000","707070","707070","707070","bbbbbb","ffffff","333333","bdc3c7","a6a6a6","2980b9");
		$allColorArray = array(
			'stars' 	=> [],
			'text' 	=> [],
			'background' => [],
			'title' 	=> [],
			'company' 	=> [],
		);
		for($i=0;$i<count($background);$i++) {
			$allColorArray['stars'][] 		= $star[$i];
			$allColorArray['text'][] 	= $text[$i];
			$allColorArray['background'][] = $background[$i];
			$allColorArray['title'][] 		= $title[$i];
			$allColorArray['company'][] 	= $company[$i];
		}
		$GLOBALS['colorStyleArray'] = $allColorArray;

		$fonts = "Alef, Amatica SC, Arimo, Assistant, Asap, Cousine, David Libre, Frank Ruhl Libre, Heebo, Miriam Libre, Rubik, Secular One, Suez One, Tahoma, Tinos, Varela Round, Aclonica, Allan, Annie Use Your Telescope, Anonymous Pro, Allerta Stencil, Allerta, Amaranth, Anton, Architects Daughter, Artifika, Arvo, Asset, Astloch, Bangers, Bentham, Bevan, Bigshot One, Bowlby One, Bowlby One SC, Brawler, Cabin, Calibri, Calligraffitti, Candal, Cantarell, Cardo, Carter One, Caudex, Cedarville Cursive, Cherry Cream Soda, Chewy, Coda, Coming Soon, Copse, Corben, Covered By Your Grace, Crafty Girls, Crimson Text, Crushed, Cuprum, Damion, Dancing Script, Dawning of a New Day, Didact Gothic, Dosis, Droid Sans, Droid Sans Mono, Droid Serif, EB Garamond, Expletus Sans, Fontdiner Swanky, Forum, Francois One, Geo, Give You Glory, Goblin One, Goudy Bookletter 1911, Gravitas One, Gruppo, Hammersmith One, Helvetica, Holtwood One SC, Homemade Apple, Inconsolata, Indie Flower, IM Fell DW Pica, IM Fell DW Pica SC, IM Fell Double Pica, IM Fell Double Pica SC, IM Fell English, IM Fell English SC, IM Fell French Canon, IM Fell French Canon SC, IM Fell Great Primer, IM Fell Great Primer SC, Irish Grover, Irish Growler, Istok Web, Josefin Sans, Josefin Slab, Judson, Jura, Just Another Hand, Just Me Again Down Here, Kameron, Kenia, Kranky, Kreon, Kristi, La Belle Aurore, Lato, League Script, Lekton, Limelight, Lobster, Lobster Two, Lora, Love Ya Like A Sister, Loved by the King, Luckiest Guy, Maiden Orange, Mako, Maven Pro, Meddon, MedievalSharp, Megrim, Merriweather, Metrophobic, Michroma, Miltonian Tattoo, Miltonian, Modern Antiqua, Monofett, Molengo, Mountains of Christmas, Muli, Neucha, Neuton, News Cycle, Nixie One, Nobile, Nova Cut, Nova Flat, Nova Mono, Nova Oval, Nova Round, Nova Script, Nova Slim, Nova Square, Nunito:light, Nunito, Nunito Sans, OFL Sorts Mill Goudy TT, Old Standard TT, Open Sans, Orbitron, Oswald, Over the Rainbow, Reenie Beanie, Pacifico, Patrick Hand, Paytone One, Permanent Marker, Philosopher, Play, Playfair Display, Podkova, PT Sans, PT Sans Narrow, PT Sans Narrow:regular,bold, PT Serif, PT Serif Caption, Puritan, Quattrocento, Quattrocento Sans, Quicksand, Radley, Raleway, Redressed, Rock Salt, Rokkitt, Roboto, Ruslan Display, Schoolbell, Shadows Into Light, Shanti, Sigmar One, Six Caps, Slackey, Smythe, Special Elite, Stardos Stencil, Sue Ellen Francisco, Sunshiney, Swanky and Moo Moo, Syncopate, Tangerine, Tenor Sans, Terminal Dosis Light, The Girl Next Door, Ubuntu, Ultra, Unkempt, UnifrakturCook:bold, UnifrakturMaguntia, Varela, Verdana, Vibur, Vollkorn, VT323, Waiting for the Sunrise, Wallpoet, Walter Turncoat, Wire One, Yanone Kaffeesatz, Yeseva One";
		$GLOBALS['fontFamily'] = explode(", ",$fonts);
		$this->iframeCode = '<div class="testimonial-iframe-outer"><div class="testimonial-iframe"><iframe width="100%" height="100%" frameborder="0" allowfullscreen="true" style="box-sizing: border-box; margin-bottom:5px; max-width: 100%; border: 1px solid rgba(0,0,0,1); background-color: rgba(255,255,255,0); box-shadow: 0px 2px 4px rgba(0,0,0,0.1);" src="'.$this->you_tube_url.'"></iframe></div></div>';
	}

	public static function sanitize_options($value, $type = "") {
		$value = stripslashes($value);
		if($type == "int") {
			$value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
		} else if($type == "email") {
			$value = sanitize_email($value);
		}  else if($type == "textarea") {
			$value = sanitize_textarea_field($value);
		} else {
			$value = sanitize_text_field($value);
		}
		return $value;
	}

	function remove_testimonial_record() {
        if (current_user_can('manage_options')) {
            $data = $_POST;
            $response = array(
                'status' => 0,
                'message' => ""
            );
            $id = isset($data['id']) ? $data['id'] : "";

            if (!isset($data['id']) || empty($data['id'])) {
                $response['message'] = __("Your request is not valid", 'stars-testimonials');
            } else if (!isset($data['nonce']) || empty($data['nonce'])) {
                $response['message'] = __("Your request is not valid", 'stars-testimonials');
            } else if (!current_user_can('delete_posts')) {
                $response['message'] = __("Your request is not valid", 'stars-testimonials');
            } else if (!wp_verify_nonce($data['nonce'], 'star_testimonial_remove_nonce_' . $id)) {
                $response['message'] = __("Your request is not valid", 'stars-testimonials');
            }

            if (empty($response['message'])) {
                $id = esc_sql($data['id']);

                global $wpdb;
                $tableName = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;

                $wpdb->delete($tableName, array('id' => $id));
                $response['status'] = 1;
                $response['message'] = __("Shortcode has been removed successfully", 'stars-testimonials');
            }
            echo json_encode($response);
            die;
        }
	}

	function save_testimonial_settings() {
        if (current_user_can('manage_options')) {
            $data = $_POST;
            $id = "";
            $response = array(
                'status' => 0,
                'message' => ""
            );
            if (isset($data['id']) && $data['id'] != "" && $data['id'] != "0") {
                $id = $data['id'];
            }
            if (!isset($data['nonce']) || empty($data['nonce'])) {
                $response['message'] = __("Your request is not valid", 'stars-testimonials');
            } else if (empty($id) && !current_user_can('edit_posts')) {
                $response['message'] = __("Your request is not valid", 'stars-testimonials');
            } else if (!empty($id) && !current_user_can('edit_posts')) {
                $response['message'] = __("Your request is not valid", 'stars-testimonials');
            } else if (empty($id) && (!wp_verify_nonce($data['nonce'], 'star_testimonial_add_nonce'))) {
                $response['message'] = __("Your request is not valid", 'stars-testimonials');
            } else if (!empty($id) && !wp_verify_nonce($data['nonce'], 'star_testimonial_update_nonce_' . $id)) {
                $response['message'] = __("Your request is not valid", 'stars-testimonials');
            }
            if (empty($response['message'])) {
                $gridCategories = isset($data['testimonial_categories']) ? $data['testimonial_categories'] : "";
                if (!empty($gridCategories) && is_array($gridCategories)) {
                    foreach ($gridCategories as $key => $value) {
                        $gridCategories[$key] = self::sanitize_options($value, "int");
                    }
                    $gridCategories = implode(",", $gridCategories);
                } else {
                    $gridCategories = "";
                }

                $query = "testimonial_type = 'grid', ";

                $query .= "testimonial_categories = '" . esc_sql($gridCategories) . "', ";

                if (isset($data['testimonial_style'])) {
                    $testimonial_style = self::sanitize_options($data['testimonial_style'], "int");
                    $query .= "testimonial_style = '" . esc_sql($testimonial_style) . "', ";
                }
                if (isset($data['grid_columns'])) {
                    $grid_columns = self::sanitize_options($data['grid_columns'], "int");
                    $query .= "grid_columns = '" . esc_sql($grid_columns) . "', ";
                }
                if (isset($data['shortcode_name'])) {
                    $shortcode_name = self::sanitize_options($data['shortcode_name']);
                    $query .= "shortcode_name = '" . esc_sql($shortcode_name) . "', ";
                }
                if (isset($data['no_of_testimonials'])) {
                    $no_of_testimonials = self::sanitize_options($data['no_of_testimonials'], "int");
                    $query .= "no_of_testimonials = '" . esc_sql($no_of_testimonials) . "', ";
                }
                if (isset($data['testimonial_order'])) {
                    $testimonial_order = self::sanitize_options($data['testimonial_order']);
                    $query .= "testimonial_order = '" . esc_sql($testimonial_order) . "', ";
                }
                if (isset($data['stars_color'])) {
                    $color = self::sanitize_options($data['stars_color']);
                    $query .= "stars_color = '" . esc_sql($color) . "', ";
                } else {
                    $query .= "stars_color = '', ";
                }
                if (isset($data['text_color'])) {
                    $color = self::sanitize_options($data['text_color']);
                    $query .= "text_color = '" . esc_sql($color) . "', ";
                } else {
                    $query .= "text_color = '', ";
                }
                if (isset($data['background_color'])) {
                    $color = self::sanitize_options($data['background_color']);
                    $query .= "background_color = '" . esc_sql($color) . "', ";
                } else {
                    $query .= "background_color = '', ";
                }
                if (isset($data['title_color'])) {
                    $color = self::sanitize_options($data['title_color']);
                    $query .= "title_color = '" . esc_sql($color) . "', ";
                } else {
                    $query .= "title_color = '', ";
                }
                if (isset($data['company_color'])) {
                    $color = self::sanitize_options($data['company_color']);
                    $query .= "company_color = '" . esc_sql($color) . "', ";
                } else {
                    $query .= "company_color = '', ";
                }
                if (isset($data['font_family']) && $data['font_family'] != "Default") {
                    $font_family = self::sanitize_options($data['font_family']);
                    $query .= "font_family = '" . esc_sql($font_family) . "', ";
                } else {
                    $query .= "font_family = '', ";
                }
                $query .= "stars_color_custom = '', ";
                $query .= "text_color_custom = '', ";
                $query .= "background_color_custom = '', ";
                $query .= "title_color_custom = '', ";
                $query .= "company_color_custom = '', ";
                $query .= "arrow_color_custom = '', ";
                $query = trim($query, ", ");
                if ($query != "") {
                    global $wpdb;
                    $tableName = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;
                    if ($id == "") {
                        $user = wp_get_current_user();
                        $query .= ", created_by = '{$user->ID}'";
                        $query = "INSERT INTO {$tableName} SET {$query}";
                        $response['message'] = __("Testimonial shortcode is created successfully", 'stars-testimonials');
                    } else {
                        $query = "UPDATE {$tableName} SET {$query} WHERE id = '{$id}'";
                        $response['message'] = __("Testimonial shortcode is updated successfully", 'stars-testimonials');
                    }
                }
                $response['status'] = 1;
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                dbDelta($query);
            }
            echo json_encode($response);
            die;
        }
	}

	function add_all_short_codes_menu() {
		
		if ( isset($_GET['hide_testirecommended_plugin']) && $_GET['hide_testirecommended_plugin'] == 1) {
			update_option('hide_testirecommended_plugin',true);				
		}
		$hide_testirecommended_plugin = get_option('hide_testirecommended_plugin');
		$recommended_plugin_name =  __('Recommended Plugins','stars-testimonials');
		
		add_submenu_page('edit.php?post_type=stars_testimonial', __('All Widget Shortcodes','stars-testimonials'), __('All Widget Shortcodes','stars-testimonials'), 'manage_options', 'all-shortcodes', array(&$this,  'short_codes_page'));
		
		add_submenu_page('edit.php?post_type=stars_testimonial', __('Collect Testimonials','stars-testimonials'), __('Collect Testimonials','stars-testimonials'), 'manage_options', 'collect_review_page', array(&$this,  'collect_review_page'));
		
		if ( !$hide_testirecommended_plugin ) {
			add_submenu_page('edit.php?post_type=stars_testimonial', $recommended_plugin_name, $recommended_plugin_name, 'manage_options', 'recommended-plugins', array(&$this,   'recommended_plugins'));
		}
		
		add_submenu_page('edit.php?post_type=stars_testimonial', __('Upgrade to Pro','stars-testimonials'), __('Upgrade to Pro','stars-testimonials'), 'manage_options', 'all-shortcodes&task=upgrade-to-pro', 'short_codes_page');
    }
	
	public function collect_review_page(){
        include_once 'collect_review_page.php';
    }
	function recommended_plugins() {
		include_once "recommended-plugins.php";
	}
    function short_codes_page() {
        $page = "all-shortcodes.php";
        if(isset($_GET['task'])) {
            $task = $_GET['task'];
            if($task == "add-new") {
                $page = "add-new-shortcode.php";
            } else if($task == "add-testimonial") {
                $page = "testimonial-add.php";
            } else if($task == "update-testimonial") {
                $post_id = isset($_REQUEST['post']) ? $_REQUEST['post'] : "";
                if (!empty($post_id) && is_numeric($post_id) && $post_id > 0) {
                    $post = get_post($post_id);
                    if (isset($post->post_type) && $post->post_type == 'stars_testimonial') {
                        $page = "testimonial-update.php";
                    } else {
                        echo "<script>window.location='".admin_url("edit.php?post_type=stars_testimonial")."'</script>";
                        exit;
                    }
                } else {
                    echo "<script>window.location='".admin_url("edit.php?post_type=stars_testimonial")."'</script>";
                    exit;
                }
            } else if($task == "upgrade-to-pro") {
                $page = "upgrade-to-pro.php";
            } else if($task == "mailjet") {
                $page = "update-mailjet.php";
            } else if($task == "edit" && isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >0 ) {
                $page = "update-shortcode.php";
            }
            else if($task == "preview" && isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >0 ) {
                $page = "preview-shortcode.php";
            }
        }
        if($page == "all-shortcodes.php" || $page == "add-new-shortcode.php") {
            $results = get_posts(array("post_type"=>"stars_testimonial","numberposts" => 1));
            if(count($results) == 0) {
                include_once "no-testimonials.php";
            } else {
                include_once $page;
            }
        } else {
            include_once $page;
        }
    }

	function remove_add_new_button_from_menu() {
		global $submenu;
		unset($submenu['edit.php?post_type=stars_testimonial'][10]); // Removes 'Add New'.
	}

	public function change_placeholder_text() {
		$screen = get_current_screen();
        if($screen->post_type == 'stars_testimonial' ) {
			$title = __('Client’s name', 'stars-testimonials');
            return $title;
		}
	}

	public function stars_testimonials_admin_styles($hook) {
        $post_type = isset($_REQUEST['post_type'])&&!empty($_REQUEST['post_type'])?$_REQUEST['post_type']:"";
        $action = isset($_REQUEST['action'])&&!empty($_REQUEST['action'])?$_REQUEST['action']:"";
        $post_type2 = "";
        if($action == "edit" && isset($_REQUEST['post'])) {
            $post = get_post($_REQUEST['post']);
            if(!empty($post)) {
                $post_type2 = $post->post_type;
            }
        }
        $task = (isset($_GET['task']) && $_GET['task'] == "upgrade-to-pro")?"upgrade":"";
        if($hook == "stars_testimonial_page_all-shortcodes" || $post_type == "stars_testimonial" || ($action == "edit" && $post_type2 == "stars_testimonial")) {
            wp_register_style('testimonial-custom-front-style', plugins_url('/css/styles.css', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_style('testimonial-custom-style-mcustomscrollbar', plugins_url('/css/admin/jquery.mcustomscrollbar.min.css', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_style('testimonial-custom-style-star-fonts', plugins_url('/css/star-fonts.css', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_style('testimonial-custom-style-range', plugins_url('/css/admin/as-range.css', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_style('testimonial-custom-style-magnific', plugins_url('/css/admin/magnific-popup.css', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_style('testimonial-custom-style-select2', plugins_url('/css/admin/select2.min.css', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_enqueue_style('testimonial-custom-style-select2');
            wp_register_style('testimonial-custom-style-sweetalert2', plugins_url('/css/admin/sweetalert2.min.css', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_style('testimonial-custom-style', plugins_url('/css/admin/admin.min.css', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_enqueue_style('testimonial-custom-front-style');
            wp_enqueue_style('testimonial-custom-style-mcustomscrollbar');
            wp_enqueue_style('testimonial-custom-style-star-fonts');
            wp_enqueue_style('testimonial-custom-style-range');
            wp_enqueue_style('testimonial-custom-style-magnific');
            wp_enqueue_style('testimonial-custom-style-sweetalert2');
            wp_enqueue_style('testimonial-custom-style');
            if(isset($_GET['task']) && $_GET['task'] == "upgrade-to-pro") {
                wp_enqueue_style('admin-setting', plugins_url('/css/admin/admin-setting.css', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            }
        }

	}

    public function stars_testimonials_admin_script($hook) {
        $post_type = isset($_REQUEST['post_type'])&&!empty($_REQUEST['post_type'])?$_REQUEST['post_type']:"";
        $action = isset($_REQUEST['action'])&&!empty($_REQUEST['action'])?$_REQUEST['action']:"";
        $post_type2 = "";
        if($action == "edit" && isset($_REQUEST['post'])) {
            $post = get_post($_REQUEST['post']);
            if(!empty($post)) {
                $post_type2 = $post->post_type;
            }
        }
        if($hook == "stars_testimonial_page_all-shortcodes" || $post_type == "stars_testimonial" || ($action == "edit" && $post_type2 == "stars_testimonial")) {
			wp_enqueue_style( 'wp-jquery-ui-dialog' );
			wp_enqueue_script( 'jquery-ui-dialog' );
            wp_enqueue_media();
            wp_register_script('testimonial-custom-script-mcustomscrollbar', plugins_url('/js/admin/jquery.mcustomscrollbar.min.js', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_script('testimonial-custom-script-mousewheel', plugins_url('/js/admin/jquery.mousewheel.min.js', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_script('testimonial-custom-script-asrange', plugins_url('/js/admin/jquery-asrange.min.js', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_script('testimonial-custom-script-magnific', plugins_url('/js/admin/jquery.magnific-popup.min.js', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_script('testimonial-custom-script-sweetalert', plugins_url('/js/admin/sweetalert.all.min.js', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_script('testimonial-custom-script-select2', plugins_url('/js/admin/select2.full.min.js', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_script('testimonial-custom-script-admin', plugins_url('/js/admin/admin.js', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_register_script('testimonial-custom-script-admin', plugins_url('/js/admin/admin.js', __FILE__), array(), PREMIO_TESTIMONIAL_PLUGIN_VERSION);
            wp_enqueue_script('testimonial-custom-script-mcustomscrollbar');
            wp_enqueue_script('testimonial-custom-script-mousewheel');
            wp_enqueue_script('testimonial-custom-script-asrange');
            wp_enqueue_script('testimonial-custom-script-magnific');
            wp_enqueue_script('testimonial-custom-script-sweetalert');
            wp_enqueue_script('testimonial-custom-script-select2');
            wp_enqueue_script('testimonial-custom-script-admin');

            wp_localize_script('testimonial-custom-script-admin', 'settings', array(
                'send_label' => __('Save Settings', 'save-settings'),
                'ajaxurl' => admin_url('admin-ajax.php'),
                'plugin_url' => admin_url('edit.php?post_type=stars_testimonial&page=all-shortcodes'),
                "REMOVE_MESSAGE" => __("Are you sure you want to delete the selected shortcode?"),
                "REQUIRED_MESSAGE" => __("This filed is required", 'stars-testimonials'),
                "PRO_URL" => admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes&task=upgrade-to-pro"),
                "stylesObj" => json_encode($GLOBALS['colorStyleArray']),
                "PRO_BUTTON" => $this->testimonialButton(),
                "IFRAME_CODE" => $this->iframeCode,
                "PRO_URL" => PRO_PLUGIN_URL
            ));
        }
	}

	function get_total_testimonials() {
//		$total = get_posts(array(
//			'post_type' => 'stars_testimonial',
//			'numberposts' => -1,
//			'post_status' => 'publish,future,draft'
//		));
//		if ($total && count($total) >= 5) {
//			return 1;
//		}
		return 0;
	}

	function register_testimonials(){
        $labels_post = array(
			'name'               => __( 'Testimonials', 'Testimonials', 'stars-testimonials' ),
			'singular_name'      => _x( 'Testimonial', 'Testimonial', 'stars-testimonials' ),
			'menu_name'          => _x( 'Stars Testimonials', 'Stars Testimonials', 'stars-testimonials' ),
			'name_admin_bar'     => _x( 'Testimonial', 'Testimonial', 'stars-testimonials' ),
			'add_new'            => _x( '+ New Testimonial', 'Testimonial', 'stars-testimonials' ),
			'add_new_item'       => _x( '+ New Testimonial', 'stars-testimonials' ),
			'new_item'           => __( 'New Testimonial', 'stars-testimonials' ),
			'edit_item'          => __( 'Edit Testimonial', 'stars-testimonials' ),
			'view_item'          => __( 'View Testimonial', 'stars-testimonials' ),
			'all_items'          => __( 'All Testimonials', 'stars-testimonials' ),
			'search_items'       => __( 'Search Testimonials', 'stars-testimonials' ),
			'parent_item_colon'  => __( 'Parent Testimonials:', 'stars-testimonials' ),
			'not_found'          => __( '<div class="no-testimonial-record"><a class="link add-testimonial-record" href="'.admin_url("post-new.php?post_type=stars_testimonial").'">+ Create Your First Testimonial</a></div><div class="no-testimonial-record record-message">Once you have your first testimonials, go to the “<a class="link" href="'.admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes").'">All Widget Shortcodes</a>” page and create your first shortcode. Check out the video for more info:</div>', 'stars-testimonials' )."<div class='no-testimonials-area'></div><style>table.fixed {border:none;} .wp-list-table thead, .wp-list-table tfoot{display: none;}",
			'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'stars-testimonials' )
		);

        $args = array(
            'labels'             => $labels_post,
            'description'        => __( 'Your Testimonials.', 'stars-testimonials' ),
            'show_ui'            => true,
            'show_in_menu'       => true,
            'rewrite'            => array( 'slug' => 'arrow_subscribe_forms' ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 25,
            'menu_icon'		 	 => 'dashicons-editor-quote',
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
        );


		register_post_type( 'stars_testimonial', $args );

		$labels_tax = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'stars-testimonials' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'stars-testimonials' ),
			'search_items'      => __( 'Search Categories', 'stars-testimonials' ),
			'all_items'         => __( 'All Categories', 'stars-testimonials' ),
			'parent_item'       => __( 'Parent Category', 'stars-testimonials' ),
			'parent_item_colon' => __( 'Parent Category:', 'stars-testimonials' ),
			'edit_item'         => __( 'Edit Category', 'stars-testimonials' ),
			'update_item'       => __( 'Update Category', 'stars-testimonials' ),
			'add_new_item'      => __( 'Add New Category', 'stars-testimonials' ),
			'new_item_name'     => __( 'New Category Name', 'stars-testimonials' ),
			'menu_name'         => __( 'Testomonial Categories', 'stars-testimonials' ),
		);

		$args_tax = array(
			'hierarchical'      => true,
			'labels'            => $labels_tax,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => false,
		);

		register_taxonomy( 'stars_testimonial_cat', array( 'stars_testimonial' ), $args_tax );


	}

	function testimonials_update_messages( $messages ){
		$post             = get_post();
		$post_type        = get_post_type( $post );
		$post_type_object = get_post_type_object( $post_type );

		$messages['stars_testimonial'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Testimonial updated.', 'stars-testimonials' ),
			2  => __( 'Custom field updated.', 'stars-testimonials' ),
			3  => __( 'Custom field deleted.', 'stars-testimonials' ),
			4  => __( 'Testimonial updated.', 'stars-testimonials' ),
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Testimonial restored to revision from %s', 'stars-testimonials' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Testimonial published.', 'stars-testimonials' ),
			7  => __( 'Testimonial saved.', 'stars-testimonials' ),
			8  => __( 'Testimonial submitted.', 'stars-testimonials' ),
			9  => sprintf(
				__( 'Testimonial scheduled for: <strong>%1$s</strong>.', 'stars-testimonials' ),
				date_i18n( __( 'M j, Y @ G:i', 'stars-testimonials' ), strtotime( $post->post_date ) )
			),
			10 => __( 'Testimonial draft updated.', 'stars-testimonials' )
		);

		return $messages;
	}

	function adding_custom_meta_boxes( $post ) {
	    add_meta_box( 
	        'stars-testimonials-settings',
	        __( 'Testimonial Settings' ),
	        array($this, 'render_settings_page'),
	        'stars_testimonial',
	        'normal',
	        'default'
	    );
	}

	function render_settings_page(){
		include 'inc/settings_page.php';
		wp_nonce_field( plugin_basename( __FILE__ ), 'wcp_testimonial_nonce' );
	}

	function save_testimonial($post_id){
        // verify if this is an auto save routine. 
        // If it is our form has not been submitted, so we dont want to do anything
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return;

        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if ( !isset( $_POST['wcp_testimonial_nonce'] ) )
            return;

        if ( !wp_verify_nonce( $_POST['wcp_testimonial_nonce'], plugin_basename( __FILE__ ) ) )
            return;

        // OK, we're authenticated: we need to find and save the data

        if (isset($_POST['testimonial_company_name'])) {
            update_post_meta( $post_id, 'testimonial_company_name', sanitize_text_field($_POST['testimonial_company_name']) );
        }

        if (isset($_POST['testimonial_company_url'])) {
            update_post_meta( $post_id, 'testimonial_company_url', esc_url($_POST['testimonial_company_url']) );
        }

        if (isset($_POST['testimonial_stars'])) {
            update_post_meta( $post_id, 'testimonial_stars', sanitize_text_field($_POST['testimonial_stars']) );
        }
	}

	function render_testimonial_stars($attr){

    	if(!isset($attr['id']) || $attr['id'] == "" || !is_numeric($attr['id']) || $attr['id'] <= 0 ) {
			return "";
		}

		global $wpdb;

		$id = $attr['id'];
		$tableName = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;

		$query = "SELECT id, testimonial_type, testimonial_style, grid_columns, font_family, testimonial_categories, shortcode_name, no_of_testimonials, testimonial_order, stars_color, text_color, background_color, title_color, company_color, created_by
        FROM {$tableName}
        WHERE id = '{$id}'";
		$result = $wpdb->get_row($query);
		if(empty($result)) {
			return "";
		}
		$settingArray = [];
		$settingArray['style'] 		= $result->testimonial_style;
		$settingArray['type'] 		= $result->testimonial_type;
		$settingArray['cats'] 		= $result->testimonial_categories;
		$settingArray['cols'] 		= $result->grid_columns;
		$settingArray['total'] 		= $result->no_of_testimonials;
		$settingArray['stars_color'] 	= $result->stars_color;
		$settingArray['text_color'] = $result->text_color;
		$settingArray['bg_color'] 	= $result->background_color;
		$settingArray['title_color'] 	= $result->title_color;
		$settingArray['company_color'] 	= $result->company_color;
		$testimonialOrder 			= $result->testimonial_order;
		switch($testimonialOrder) {
			case 1:
				$settingArray['orderby']= "date";
				$settingArray['order']	= "ASC";
				break;
			case 2:
				$settingArray['orderby']= "date";
				$settingArray['order']	= "DESC";
				break;
			case 3:
				$settingArray['orderby']= "title";
				$settingArray['order']	= "ASC";
				break;
			case 4:
				$settingArray['orderby']= "title";
				$settingArray['order']	= "DESC";
				break;
			default:
				$settingArray['orderby']= "date";
				$settingArray['order']	= "DESC";
				break;
		}

    	wp_enqueue_style( 'font-star-fonts', plugin_dir_url( __FILE__ ).'/css/star-fonts.css' );
		wp_enqueue_style( 'stars-testimonials-styles', plugin_dir_url( __FILE__ ).'/css/styles.css' );
		extract(shortcode_atts( array(
			'style' => '1',
			'type' => 'grid',
			'cats' => '',
			'cols' => '2',
			'order' => 'DESC',
			'orderby' => 'date',
			'total' => '-1',
			'stars_color' => '',
			'text_color' => '',
			'bg_color' => '',
			'title_color' => '',
			'company_color' => '',
			'arrows_color' => 'red',
		), $settingArray) );

		// Init the Vars
		$row_class = '';
		$column_class = '';
		$data_attr = '';

		switch ($type) {
			case 'grid':
				wp_enqueue_style( 'simple-grid', plugin_dir_url( __FILE__ ).'/css/simplegrid.css' );
                wp_enqueue_script( 'wcp-grid-js', plugin_dir_url( __FILE__ ).'/js/grid.js', array('jquery'));
				$row_class = 'grid';
				$column_class = 'col-1-'.$cols;
				break;
			default:
				# code...
				break;
		}

		$args = array(
			'post_type'   => 'stars_testimonial',
			'posts_per_page'   => $total,
			'order'               => $order,
			'orderby'             => $orderby,
		);
		
		if ($cats != '') {
			$args['tax_query'] = array(
				'relation'  => 'AND',
				array(
					'taxonomy'         => 'stars_testimonial_cat',
					'field'            => 'id',
					'terms'            => explode(',', $cats),
					'include_children' => true,
					'operator'         => 'IN'
				),
			);
		}
		$r_id = rand();
		
		ob_start();
		$query_testimonials = new WP_Query( $args );

		if ( $query_testimonials->have_posts() ) {
			echo '<div class="stars-testimonials premio-testimonials-'.$type.'" id="st-'.$r_id.'">';
			$settingString = "";
			echo '<div class="premio-testimonials-content '.$row_class.'" '.$data_attr.' '.$settingString.'>';

			while ( $query_testimonials->have_posts() ) {
				$query_testimonials->the_post();
				$company = get_post_meta( get_the_id(), 'testimonial_company_name', true );
				$url = get_post_meta( get_the_id(), 'testimonial_company_url', true );
				$stars = get_post_meta( get_the_id(), 'testimonial_stars', true );
				echo '<div class="pre-testimonials-content '.$column_class.'">';
				include 'templates/style'.$style.'.php';
				echo '</div>';
			}


			echo '</div>';
			echo '</div>';
			if($result->font_family != "") {
				echo '<link href="https://fonts.googleapis.com/css?family='.urlencode($result->font_family).'" rel="stylesheet" tyle="text/css">';
			}
			echo "<style>";
			if($stars_color != "")
				echo "#st-$r_id .st-rating { color:  #$stars_color; }";
			if($text_color != "")
				echo "#st-$r_id .st-testimonial-content { color:  #$text_color; }";
			if($text_color != "")
				echo "#st-$r_id .st-testimonial-content p { color:  #$text_color; }";
			if($bg_color != "")
				echo "#st-$r_id .st-testimonial-bg { background-color: #$bg_color; }";
			if($bg_color != "")
				echo "#st-$r_id .style7 { border-bottom-color: #$bg_color; }";
			if($bg_color != "")
				echo "#st-$r_id .style7::before { background-color: #$bg_color; }";
			if ($bg_color != '') {
				echo "#st-$r_id .st-style17 .st-testimonial-bg::before { border-color: transparent transparent transparent #$bg_color; }";
			}
			if($title_color != "")
				echo "#st-$r_id .st-testimonial-title { color: #$title_color; }";
			if($company_color != "")
				echo "#st-$r_id .st-testimonial-company { color: #$company_color; }";
			if($result->font_family != "") {
				echo "#st-$r_id figure, #st-$r_id  blockquote{font-family:{$result->font_family}}";
			}
			echo "</style>";
			wp_reset_postdata();
		}

		return ob_get_clean();
	}

	function render_stars_testimonials($atts){
		wp_enqueue_style( 'font-star-fonts', plugin_dir_url( __FILE__ ).'/css/star-fonts.css' );
		wp_enqueue_style( 'stars-testimonials-styles', plugin_dir_url( __FILE__ ).'/css/styles.css' );
		extract(shortcode_atts( array(
			'style' => '1',
			'type' => 'grid',
			'cats' => '',
			'cols' => '2',
			'order' => 'DESC',
			'orderby' => 'date',
			'total' => '-1',
			'stars_color' => '',
			'text_color' => '',
			'bg_color' => '',
			'title_color' => '',
			'company_color' => '',
			'arrows_color' => 'red',
		), $atts) );

		// Init the Vars
		$row_class = '';
		$column_class = '';
		$data_attr = '';

		switch ($type) {
			case 'grid':
				wp_enqueue_style( 'simple-grid', plugin_dir_url( __FILE__ ).'/css/simplegrid.css' );
                wp_enqueue_script( 'wcp-grid-js', plugin_dir_url( __FILE__ ).'/js/grid.js', array('jquery'));
				$row_class = 'grid';
				$column_class = 'col-1-'.$cols;
				break;
			case 'masonry':
				wp_enqueue_style( 'simple-grid', plugin_dir_url( __FILE__ ).'/css/simplegrid.css' );
				wp_enqueue_script( 'wcp-masonry-js', plugin_dir_url( __FILE__ ).'/js/masonry.js', array('jquery', 'jquery-masonry') );
				$row_class = 'grid masonry-wrap';
				$column_class = 'masonry-item col-1-'.$cols;
				break;
			case 'slider':
				wp_enqueue_style( 'slick-css', plugin_dir_url( __FILE__ ).'/css/slick.css' );
				wp_enqueue_script( 'slick-js', plugin_dir_url( __FILE__ ).'/js/slick.min.js', array('jquery') );
				wp_enqueue_script( 'wcp-script-js', plugin_dir_url( __FILE__ ).'/js/script.js', array('jquery') );
				$row_class = 'wcp-slick';
				$column_class = '';
				if (is_array($atts)) {
			        foreach ($atts as $p_name => $p_val) {
			            $data_attr .= ' data-'.$p_name.' = '.$p_val;
			        }
				}
				break;
			
			default:
				# code...
				break;
		}

		$args = array(
			'post_type'   => 'stars_testimonial',
			'posts_per_page'   => $total,
			'order'               => $order,
			'orderby'             => $orderby,			
		);

		if ($cats != '') {
			$args['tax_query'] = array(
			'relation'  => 'AND',
				array(
					'taxonomy'         => 'stars_testimonial_cat',
					'field'            => 'id',
					'terms'            => explode(',', $cats),
					'include_children' => true,
					'operator'         => 'IN'
				),
			);
		}
		$r_id = rand();
		ob_start();
		$query_testimonials = new WP_Query( $args );

		if ( $query_testimonials->have_posts() ) {
			echo '<div class="stars-testimonials premio-testimonials='.$type.'" id="st-'.$r_id.'">';
				if($type == "slider") {

				}
				echo '<div class="premio-testimonials-content '.$row_class.'" '.$data_attr.'>';

				while ( $query_testimonials->have_posts() ) {
					$query_testimonials->the_post();
						$company = get_post_meta( get_the_id(), 'testimonial_company_name', true );
						$url = get_post_meta( get_the_id(), 'testimonial_company_url', true );
						$stars = get_post_meta( get_the_id(), 'testimonial_stars', true );					
						echo '<div class="pre-testimonials-content '.$column_class.'">';
							include 'templates/style'.$style.'.php';
						echo '</div>';
				}
			
			
				echo '</div>';
			echo '</div>';
			echo "<style>";
			echo "#st-$r_id .st-rating { color:  $stars_color; }";
			echo "#st-$r_id .st-testimonial-content { color:  $text_color; }";
			echo "#st-$r_id .st-testimonial-content p { color:  $text_color; }";
			echo "#st-$r_id .st-testimonial-bg { background-color: $bg_color; }";
			echo "#st-$r_id .style1 .arrow { border-top-color: $bg_color; }";
			echo "#st-$r_id .style3 .arrow { border-top-color: $bg_color; }";
			echo "#st-$r_id .style10 .arrow { border-top-color: $bg_color; }";
			echo "#st-$r_id .style7 { border-bottom-color: $bg_color; }";
			echo "#st-$r_id .style7::before { background-color: $bg_color; }";
			if ($bg_color != '') {
			echo "#st-$r_id .st-style17 .st-testimonial-bg::before { border-color: transparent transparent transparent $bg_color; }";
			}
			echo "#st-$r_id .st-testimonial-title { color: $title_color; }";
			echo "#st-$r_id .slick-prev:before, #st-$r_id .slick-next:before { color: $arrows_color; }";
			echo "#st-$r_id .st-testimonial-company { color: $company_color; }";
			echo "</style>";
			wp_reset_postdata();
		}

		return ob_get_clean();
	}

	function display_rating($count){
		switch ($count) {
			case '5.0':
				echo '<i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i>';
				break;
			case '4.5':
				echo '<i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star-half-o"></i>';
				break;
			case '4.0':
				echo '<i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star-o"></i>';
				break;
			case '3.5':
				echo '<i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star-half-o"></i><i class="pst-star-o"></i>';
				break;
			case '3.0':
				echo '<i class="pst-star"></i><i class="pst-star"></i><i class="pst-star"></i><i class="pst-star-o"></i><i class="pst-star-o"></i>';
				break;
			case '2.5':
				echo '<i class="pst-star"></i><i class="pst-star"></i><i class="pst-star-half-o"></i><i class="pst-star-o"></i><i class="pst-star-o"></i>';
				break;
			case '2.0':
				echo '<i class="pst-star"></i><i class="pst-star"></i><i class="pst-star-o"></i><i class="pst-star-o"></i><i class="pst-star-o"></i>';
				break;
			case '1.5':
				echo '<i class="pst-star"></i><i class="pst-star-half-o"></i><i class="pst-star-o"></i><i class="pst-star-o"></i><i class="pst-star-o"></i>';
				break;
			case '1.0':
				echo '<i class="pst-star"></i><i class="pst-star-o"></i><i class="pst-star-o"></i><i class="pst-star-o"></i><i class="pst-star-o"></i>';
				break;
			case '0.5':
				echo '<i class="pst-star-half-o"></i><i class="pst-star-o"></i><i class="pst-star-o"></i><i class="pst-star-o"></i><i class="pst-star-o"></i>';
				break;
			
			default:
				echo '';
				break;
		}
	}

	function display_company($company, $url){
		if ($url != '') { ?>
			<a target="_blank" href="<?php echo esc_url( $url ); ?>"><?php echo esc_attr( $company ); ?></a>
		<?php } else {
			echo $company;
		}
	}

	function testimonial_integrateWithVC(){
	   vc_map( array(
			"name" => __( "Stars Testimonial", "stars-testimonials" ),
			"base" => "stars_testimonials",
			"class" => "",
			"category" => __( "Content", "stars-testimonials"),
			"params" => array(
				array(
				"type" 			=> 	"dropdown",
				"heading" 		=> 	__( 'Testimonial Type', 'counter-vc' ),
				"param_name" 	=> 	"type",
				"description" 	=> 	__( 'Choose how you want to display testimonials', 'counter-vc' ),
				"group" 		=> 	'General',
				"value" 		=> array(
					"Grid"		=> "grid", 
					"Masonry Grid" 	=> "masonry",
					"Slider" 	=> "slider",
					)
				),
				array(
				"type" 			=> 	"dropdown",
				"heading" 		=> 	__( 'Testimonial Style', 'counter-vc' ),
				"param_name" 	=> 	"style",
				"description" 	=> 	__( 'Choose single testimonial style here', 'counter-vc' ),
				"group" 		=> 	'General',
				"value" 		=> array(
					"Style 1"		=> "1",
					"Style 2"		=> "2",
					"Style 3"		=> "3",
					"Style 4"		=> "4",
					"Style 5"		=> "5",
					"Style 6"		=> "6",
					"Style 7"		=> "7",
					"Style 8"		=> "8",
					"Style 9"		=> "9",
					"Style 10"		=> "10",
					"Style 11"		=> "11",
					"Style 12"		=> "12",
					"Style 13"		=> "13",
					"Style 14"		=> "14",
					"Style 15"		=> "15",
					"Style 16"		=> "16",
					"Style 17"		=> "17",
					)
				),
				array(
				"type" 			=> 	"dropdown",
				"heading" 		=> 	__( 'Number of Columns', 'counter-vc' ),
				"param_name" 	=> 	"cols",
				"description" 	=> 	__( 'How many testimonials in a row', 'counter-vc' ),
				"group" 		=> 	'General',
				"value" 		=> array(
					"1 Column"		=> "1",
					"2 Columns"		=> "2",
					"3 Columns"		=> "3",
					"4 Columns"		=> "4",
					"5 Columns"		=> "5",
					"6 Columns"		=> "6",
					"7 Columns"		=> "7",
					"8 Columns"		=> "8",
					"9 Columns"		=> "9",
					"10 Columns"		=> "10",
					"11 Columns"		=> "11",
					"12 Columns"		=> "12",
				),
				'dependency' => array( 'element' => 'type', 'value' => array('grid', 'masonry') ),
				),
				array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Categories', 'counter-vc' ),
				"param_name" 	=> 	"cats",
				"description" 	=> 	__( 'Comma separated categories IDs', 'counter-vc' ),
				"group" 		=> 	'General',
				),
				array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Order', 'counter-vc' ),
				"param_name" 	=> 	"order",
				"description" 	=> 	__( 'ASC or DESC', 'counter-vc' ),
				"group" 		=> 	'General',
				),
				array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Order By', 'counter-vc' ),
				"param_name" 	=> 	"orderby",
				"description" 	=> 	__( 'Eg: date', 'counter-vc' ),
				"group" 		=> 	'General',
				),
				array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Total Number of Testimonials', 'counter-vc' ),
				"param_name" 	=> 	"total",
				"description" 	=> 	__( 'How many maximum testimonials you want to display, -1 for all', 'counter-vc' ),
				"group" 		=> 	'General',
				),
				
				array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Number of Columns', 'counter-vc' ),
				"param_name" 	=> 	"slidestoshow",
				"description" 	=> 	__( 'How many testimonials at a time', 'counter-vc' ),
				"group" 		=> 	'Slider Settings',
				'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
				),

				array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Slides to Scroll', 'counter-vc' ),
				"param_name" 	=> 	"slidestoscroll",
				"description" 	=> 	__( 'How many testimonial scroll at a time', 'counter-vc' ),
				"group" 		=> 	'Slider Settings',
				'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
				),

				array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Slider Speed', 'counter-vc' ),
				"param_name" 	=> 	"speed",
				"description" 	=> 	__( 'Provide slide speed in ms', 'counter-vc' ),
				"group" 		=> 	'Slider Settings',
				'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
				),

				array(
				"type" 			=> 	"checkbox",
				"heading" 		=> 	__( 'Bottom Dots', 'counter-vc' ),
				"param_name" 	=> 	"dots",
				"description" 	=> 	__( 'Check to enable dots', 'counter-vc' ),
				"group" 		=> 	'Slider Settings',
				'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
				),

				array(
				"type" 			=> 	"checkbox",
				"heading" 		=> 	__( 'Arrows', 'counter-vc' ),
				"param_name" 	=> 	"arrows",
				"description" 	=> 	__( 'Check to enable navigation arrows', 'counter-vc' ),
				"group" 		=> 	'Slider Settings',
				'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
				),

				array(
				"type" 			=> 	"checkbox",
				"heading" 		=> 	__( 'Auto Play', 'counter-vc' ),
				"param_name" 	=> 	"autoplay",
				"description" 	=> 	__( 'Check to enable auto play', 'counter-vc' ),
				"group" 		=> 	'Slider Settings',
				'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
				),

				array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Auto Play Speed', 'counter-vc' ),
				"param_name" 	=> 	"autoplayspeed",
				"description" 	=> 	__( 'Auto Play speed in ms Eg: 3000', 'counter-vc' ),
				"group" 		=> 	'Slider Settings',
				'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
				),

				array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Stars Color', 'counter-vc' ),
				"param_name" 	=> 	"stars_color",
				"description" 	=> 	__( 'Choose Stars rating color here', 'counter-vc' ),
				"group" 		=> 	'Colors',
				),

				array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Text Color', 'counter-vc' ),
				"param_name" 	=> 	"text_color",
				"description" 	=> 	__( 'Choose testimonial text color here', 'counter-vc' ),
				"group" 		=> 	'Colors',
				),

				array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Background Color', 'counter-vc' ),
				"param_name" 	=> 	"bg_color",
				"description" 	=> 	__( 'Choose testimonial background color here', 'counter-vc' ),
				"group" 		=> 	'Colors',
				),

				array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Title Color', 'counter-vc' ),
				"param_name" 	=> 	"title_color",
				"description" 	=> 	__( 'Choose testimonial title color here', 'counter-vc' ),
				"group" 		=> 	'Colors',
				),

				array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Company Name Color', 'counter-vc' ),
				"param_name" 	=> 	"company_color",
				"description" 	=> 	__( 'Choose testimonial company name color here', 'counter-vc' ),
				"group" 		=> 	'Colors',
				),

				array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Slider Arrows', 'counter-vc' ),
				"param_name" 	=> 	"arrows_color",
				"description" 	=> 	__( 'Choose testimonial slider arrows color here', 'counter-vc' ),
				"group" 		=> 	'Colors',
				),
			)
	   ) );
	}
}

?>