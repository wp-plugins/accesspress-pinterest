<?php defined('ABSPATH') or die('No script kiddies please!'); ?>
<div class="apsp-outer-wrapper">
    <div class='apsp-main-wrapper'>
        <div class="apsp-setting-header clearfix">
            <div class="apsp-headerlogo">
                <img src="<?php echo APSP_IMAGE_DIR; ?>/logo.png" alt="<?php esc_attr_e('AccessPress Pinterest', APSP_TEXT_DOMAIN); ?>" />
            </div>
            <div class="apsp-right-header-block">
                <div class="apsp-header-icons">
                    <p>Follow us for new updates</p>
                    <div class="apsp-social-bttns">
                        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAccessPress-Themes%2F1396595907277967&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=1411139805828592" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px; width:50px " allowtransparency="true"></iframe>
                        &nbsp;&nbsp;
                        <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" src="http://platform.twitter.com/widgets/follow_button.5f46501ecfda1c3e1c05dd3e24875611.en.html#_=1421918256492&amp;dnt=true&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=apthemes&amp;show_count=false&amp;show_screen_name=true&amp;size=m" class="twitter-follow-button twitter-follow-button" title="Twitter Follow Button" data-twttr-rendered="true" style="width: 126px; height: 20px;"></iframe>
                        <script>
                            !function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "//platform.twitter.com/widgets.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, "script", "twitter-wjs");
                        </script>

                    </div>
                </div>
                <div class="apsp-header-title">
                    <?php _e('AccessPress Pinterest', APSP_TEXT_DOMAIN); ?>
                </div>
            </div>
        </div>


        <?php
        $options = get_option(APSP_SETTINGS);
        if (isset($_SESSION['apsp_message'])) {
            ?>
            <div class="apsp-message">
                <p><?php
                    echo $_SESSION['apsp_message'];
                    unset($_SESSION['apsp_message']);
                    ?></p>
            </div>
        <?php } ?>



        <div class="apsp-backend-wrapper clearfix">
            <ul class="apsp-setting-tabs">
                <li><a href="javascript:void(0)" id="apsp-pinit-hover-settings" class="apsp-tabs-trigger apsp-active-tab	"><i class="fa fa-pinterest-square"></i><?php _e('Pinterest pin it settings', APSP_TEXT_DOMAIN); ?></a></li>
                <li><a href="javascript:void(0)" id="apsp-how-to-use" class="apsp-tabs-trigger"><i class="fa fa-cog"></i><?php _e('How To Use', APSP_TEXT_DOMAIN); ?></a></li>
                <li><a href="javascript:void(0)" id="apsp-about" class="apsp-tabs-trigger"><i class="fa fa-key"></i><?php _e('About', APSP_TEXT_DOMAIN); ?></a></li>
            </ul>


            <div class="apsp-form-wrap">
                <form action="<?php echo admin_url() . 'admin-post.php' ?>" method='post'>
                    <div class='apsp-tab-contents apsp-active-tab' id='tab-apsp-pinit-hover-settings'>
                        <h2 class="apsp-title"><?php _e('Pinterest pinit.js Loading settings', APSP_TEXT_DOMAIN); ?></h2>
                        <div class="disable-wrap clearfix">
                            <label class='apsp-disable-pinit-js'><?php _e('Disable pinit.js?', APSP_TEXT_DOMAIN); ?> </label>
                            <div class="check-box-disable">
                                <input type='checkbox' id='apsp-disable-pinit-js' name='apsp-pinit-js-disable' <?php if (isset($options['pinit_js_disable']) && $options['pinit_js_disable'] == 'on') { ?> checked='checked'; <?php } ?>/> <label for='apsp-disable-pinit-js' ><?php _e('Disable output of pinit.js, the JavaScript file from this plugin.', APSP_TEXT_DOMAIN); ?></label>
                                <p class='apsp-info'><?php _e('Check this option if you have pinit.js already called in another plugin or theme. Multiple insertion of pinit.js on a page can cause conflicts.', APSP_TEXT_DOMAIN); ?></p>
                            </div>
                        </div>
                        <h2 class="apsp-title"><?php _e('Pinterest Pin it Hover Settings', APSP_TEXT_DOMAIN); ?></h2>
                        <input type="hidden" name="action" value="apsp_save_options" />
                        <input type='checkbox' id='apsp_js_enabled' name='apsp-pinit-js' <?php if (isset($options['js_enabled']) && $options['js_enabled'] == 'on') { ?> checked='checked'; <?php } ?>/> <label for='apsp_js_enabled'><?php _e('Enable the Pin It hover button over images.', APSP_TEXT_DOMAIN); ?></label>
                        <h3 class="apsp-sub-title"><?php _e('Button apperance settings', APSP_TEXT_DOMAIN); ?></h3>
                        <div class="apsp-select-wrapper">
                            <label for='apsp-pinterest-button-size'><?php _e('size:', APSP_TEXT_DOMAIN); ?> </label>
                            <select name='apsp-pinterest-button-size' id='apsp-pinterest-button-size'>
                                <option value='small' <?php selected($options['size'], 'small'); ?>><?php _e('Small', APSP_TEXT_DOMAIN); ?></option>
                                <option value='28' <?php selected($options['size'], '28'); ?>><?php _e('Large', APSP_TEXT_DOMAIN); ?></option>
                            </select>
                        </div>

                        <div class="apsp-select-wrapper">
                            <label for='apsp-pinterest-button-shape'><?php _e('shape:', APSP_TEXT_DOMAIN); ?> </label>
                            <select name='apsp-pinterest-button-shape' id='apsp-pinterest-button-shape'>
                                <option value='rectangular' <?php selected($options['shape'], 'rectangular'); ?> ><?php _e('Rectangular', APSP_TEXT_DOMAIN); ?></option>
                                <option value='round' <?php selected($options['shape'], 'round'); ?> ><?php _e('Circular', APSP_TEXT_DOMAIN); ?></option>
                            </select>
                        </div>
                        <div class="apsp-rectangular-options" <?php if ($options['shape'] == 'rectangular') { ?> style="display:block;" <?php } else { ?>style='display:none;' <?php } ?>>
                            <h3 class="apsp-sub-title"> <?php _e('Options for rectangular shape button', APSP_TEXT_DOMAIN); ?></h3>
                            <div class="apsp-select-wrapper">
                                <label for='apsp-pinterest-rectangle-color'><?php _e('Color: ', APSP_TEXT_DOMAIN); ?></label>
                                <select name='apsp-pinterest-rectangle-color' id='apsp-pinterest-rectangle-color'>
                                    <option value='red' <?php selected($options['color'], 'red'); ?>><?php _e('Red', APSP_TEXT_DOMAIN); ?></option>
                                    <option value='gray' <?php selected($options['color'], 'gray'); ?>><?php _e('Gray', APSP_TEXT_DOMAIN); ?></option>
                                    <option value='white' <?php selected($options['color'], 'white'); ?>><?php _e('White', APSP_TEXT_DOMAIN); ?></option>
                                </select>
                            </div>

                            <div class="apsp-select-wrapper">
                                <label for='apsp-pinterest-rectangle-lang'><?php _e('Language:', APSP_TEXT_DOMAIN); ?></label>
                                <select name='apsp-pinterest-rectangle-lang' id='apsp-pinterest-rectangle-lang'>
                                    <option value='english' <?php selected($options['language'], 'english'); ?> ><?php _e('English', APSP_TEXT_DOMAIN); ?></option>
                                    <option value='ja' <?php selected($options['language'], 'ja'); ?> ><?php _e('Japanese', APSP_TEXT_DOMAIN); ?></option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class='apsp-tab-contents' id='tab-apsp-how-to-use' style="display:none">
                        <?php include('how-to-use.php'); ?>
                    </div>

                    <div class='apsp-tab-contents' id='tab-apsp-about' style="display:none">
                        <?php include('apsp-about.php'); ?>
                    </div>

                    <?php wp_nonce_field('apsp_nonce_save_settings', 'apsp_add_nonce_save_settings'); ?>
                    <input type='submit' name='apsp_save_settings' value='Save Settings' class="apsp-save-btn" />
                    <?php $nonce = wp_create_nonce('apsp-restore-default-settings-nonce'); ?>
                    <a class="apsp-btn-wrap" href="<?php echo admin_url() . 'admin-post.php?action=apsp_restore_default_settings&_wpnonce=' . $nonce; ?>" onclick="return confirm('<?php _e('Are you sure you want to restore default settings?', APSP_TEXT_DOMAIN); ?>')"><input type="button" value="Restore Default Settings" class="apsp-reset-button"/></a>
                </form>
            </div> <!-- apsp form wrapper -->
        </div> <!-- apsp backend wrapper -->
    </div> <!-- apsp main wrapper -->

    <div class='apsp-add-wrapper'>
        <a href="https://accesspressthemes.com/wordpress-plugins/accesspress-pinterest-pro/" target="_blank" ><img src="<?php echo APSP_IMAGE_DIR; ?>/promo-top.jpg" alt="promo-top"></a>
        <div class="apsp-promo-buttons"><a target="_blank" href="http://accesspressthemes.com/demo/wordpress-plugins/accesspress-pinterest-pro"><img src="<?php echo APSP_IMAGE_DIR; ?>/demo-btn.png" alt="demo link"></a><a target="_blank" href="http://codecanyon.net/item/accesspress-pinterest-pro/11038373?ref=AccessKeys"><img src="<?php echo APSP_IMAGE_DIR; ?>/upgrade-btn.png" alt="upgrade link"></a></div>
        <a href="https://accesspressthemes.com/wordpress-plugins/accesspress-pinterest-pro/" target="_blank" ><img src="<?php echo APSP_IMAGE_DIR; ?>/promo-bottom.jpg" alt="promo-bottom"></a>
        <div class="apsp-promo-buttons"><a target="_blank" href="http://accesspressthemes.com/demo/wordpress-plugins/accesspress-pinterest-pro"><img src="<?php echo APSP_IMAGE_DIR; ?>/demo-btn.png" alt="demo link"></a><a target="_blank" href="http://codecanyon.net/item/accesspress-pinterest-pro/11038373?ref=AccessKeys"><img src="<?php echo APSP_IMAGE_DIR; ?>/upgrade-btn.png" alt="upgrade link"></a></div>
    </div>
</div> <!-- apsp outer wrapper -->