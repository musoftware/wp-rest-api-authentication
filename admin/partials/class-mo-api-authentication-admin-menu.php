<?php

require('support/class-mo-api-authentication-support.php');
require('config/class-mo-api-authentication-config.php');
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       miniorange
 * @since      1.0.0
 *
 * @package    Miniorange_api_authentication
 * @subpackage Miniorange_api_authentication/admin/partials
 */

function mo_api_authentication_main_menu()
{

    $currenttab = "";
    if (isset($_GET['tab']))
        $currenttab = $_GET['tab'];

    Mo_API_Authentication_Admin_Menu::mo_api_auth_show_menu($currenttab);
    echo '
	<div id="mo-api-authentication_settings">';
    echo '
		<div class="miniorange_container">';
    echo '
		<table style="width:100%;">
			<tr>
				<td style="vertical-align:top;width:65%;" class="mo_oauth_content">';
    Mo_API_Authentication_Admin_Menu::mo_api_auth_show_tab($currenttab);

    Mo_API_Authentication_Admin_Menu::mo_api_auth_show_support_sidebar($currenttab);
    echo '
				</td>
			</tr>
		</table>
		<div class="mo_api_authentication_tutorial_overlay" id="mo_api_authentication_tutorial_overlay" hidden></div>
		</div>';
}

class Mo_API_Authentication_Admin_Menu
{

    public static function mo_api_auth_show_menu($currenttab)
    { ?>
        <div class="wrap">
            <div>
                <img style="float:left;" src="<?php echo dirname(plugin_dir_url(__FILE__)); ?>/images/logo.png">
            </div>
        </div>
        <div class="wrap">
            <h1>
                miniOrange API Authentication&nbsp
                <a class="add-new-h2" href="https://forum.miniorange.com/" target="_blank">Ask questions on our forum</a>
            </h1>
        </div>
        <style>
            .add-new-hover:hover {
                color: white !important;
            }
        </style>
        <div id="tab">
            <h2 class="nav-tab-wrapper">
                <a class="nav-tab <?php if ($currenttab == 'config') echo 'nav-tab-active'; ?>" href="admin.php?page=mo-api-authentication_settings&tab=config">Configure API Authentication</a>
            </h2>
        </div>
<?php

    }


    public static function mo_api_auth_show_tab($currenttab)
    {
        if ($currenttab == '' || $currenttab == 'config')
            Mo_OAuth_Client_Admin_Config::mo_api_auth_api_authentication_config();
    }

    public static function mo_api_auth_show_support_sidebar($currenttab)
    {
        if ($currenttab != 'licensing') {
            echo '<td style="vertical-align:top;padding-left:1%;" class="mo_oauth_sidebar">';
            echo Mo_OAuth_Client_Admin_Support::mo_api_authentication_support();
            echo '</td>';
        }
    }
}
