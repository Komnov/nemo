<?php if ( ! defined( 'OT_VERSION' ) ) exit( 'No direct script access allowed' );
/**
 * OptionTree settings page functions.
 *
 * @package   OptionTree
 * @author    Derek Herman <derek@valendesigns.com>
 * @copyright Copyright (c) 2013, Derek Herman
 * @since     2.0
 */

/**
 * Create option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_theme_options_ui' ) ) {

  function ot_type_theme_options_ui() {
    global $blog_id;

    echo '<form method="post" id="option-tree-settings-form">';

      /* form nonce */
      wp_nonce_field( 'option_tree_settings_form', 'option_tree_settings_nonce' );

      /* format setting outer wrapper */
      echo '<div class="format-setting type-textblock has-desc">';

        /* description */
        echo '<div class="description">';

          echo '<h4>'. esc_html__( 'Warning!', 'uncode-core' ) . '</h4>';
          echo '<p class="warning">' . sprintf( wp_kses(__( 'Go to the %s page if you want to save data, this page is for adding settings.', 'uncode-core' ), array( 'a' => array( 'href' => array() ), 'code' => array() ) ), '<a href="' . get_admin_url( $blog_id, apply_filters( 'ot_theme_options_parent_slug', 'themes.php' ) . '?page=' . apply_filters( 'ot_theme_options_menu_slug', 'ot-theme-options' ) ) . '"><code>Appearance->Theme Options</code></a>' ) . '</p>';
          echo '<p class="warning">' . sprintf( wp_kses(__( 'If you\'re unsure or not completely positive that you should be editing these settings, you should read the %s first.', 'uncode-core' ), array( 'a' => array( 'href' => array() ), 'code' => array() ) ), '<a href="' . get_admin_url( $blog_id, 'admin.php?page=ot-documentation' ) . '"><code>Options Utils->Documentation</code></a>' ) . '</p>';
          echo '<h4>'. esc_html__( 'Things could break or be improperly displayed to the end-user if you do one of the following:', 'uncode-core' ) . '</h4>';
          echo '<p class="warning">' . esc_html__( 'Give two sections the same ID, give two settings the same ID, give two contextual help content areas the same ID, don\'t create any settings, or have a section at the end of the settings list.', 'uncode-core' ) . '</p>';
          echo '<p>' . esc_html__( 'You can create as many settings as your project requires and use them how you see fit. When you add a setting here, it will be available on the Theme Options page for use in your theme. To separate your settings into sections, click the "Add Section" button, fill in the input fields, and a new navigation menu item will be created.', 'uncode-core' ) . '</p>';
          echo '<p>' . esc_html__( 'All of the settings can be sorted and rearranged to your liking with Drag & Drop. Don\'t worry about the order in which you create your settings, you can always reorder them.', 'uncode-core' ) . '</p>';

        echo '</div>';

        /* get the saved settings */
        $settings = ot_settings_value();

        /* wrap settings array */
        echo '<div class="format-setting-inner">';

          /* set count to zero */
          $count = 0;

          /* loop through each section and its settings */
          echo '<ul class="option-tree-setting-wrap option-tree-sortable" id="option_tree_settings_list" data-name="' . ot_settings_id() . '[settings]">';

          if ( isset( $settings['sections'] ) ) {

            foreach( $settings['sections'] as $section ) {

              /* section */
              echo '<li class="' . ( $count == 0 ? 'ui-state-disabled' : 'ui-state-default' ) . ' list-section">' . ot_sections_view( ot_settings_id() . '[sections]', $count, $section ) . '</li>';

              /* increment item count */
              $count++;

              /* settings in this section */
              if ( isset( $settings['settings'] ) ) {

                foreach( $settings['settings'] as $setting ) {

                  if ( isset( $setting['section'] ) && $setting['section'] == $section['id'] ) {

                    echo '<li class="ui-state-default list-setting">' . ot_settings_view( ot_settings_id() . '[settings]', $count, $setting ) . '</li>';

                    /* increment item count */
                    $count++;

                  }

                }

              }

            }

          }

          echo '</ul>';

          /* buttons */
          echo '<a href="javascript:void(0);" class="option-tree-section-add option-tree-ui-button button hug-left">' . esc_html__( 'Add Section', 'uncode-core' ) . '</a>';
          echo '<a href="javascript:void(0);" class="option-tree-setting-add option-tree-ui-button button">' . esc_html__( 'Add Setting', 'uncode-core' ) . '</a>';
          echo '<button class="option-tree-ui-button button button-primary right hug-right">' . esc_html__( 'Save Changes', 'uncode-core' ) . '</button>';

          /* sidebar textarea */
          echo '
          <div class="format-setting-label" id="contextual-help-label">
            <h3 class="label">' . esc_html__( 'Contextual Help', 'uncode-core' ) . '</h3>
          </div>
          <div class="format-settings" id="contextual-help-setting">
            <div class="format-setting type-textarea no-desc">
              <div class="description"><strong>' . esc_html__( 'Contextual Help Sidebar', 'uncode-core' ) . '</strong>: ' . esc_html__( 'If you decide to add contextual help to the Theme Option page, enter the optional "Sidebar" HTML here. This would be an extremely useful place to add links to your themes documentation or support forum. Only after you\'ve added some content below will this display to the user.', 'uncode-core' ) . '</div>
              <div class="format-setting-inner">
                <textarea class="textarea" rows="10" cols="40" name="' . ot_settings_id(). '[contextual_help][sidebar]">' . ( isset( $settings['contextual_help']['sidebar'] ) ? esc_html( $settings['contextual_help']['sidebar'] ) : '' ) . '</textarea>
              </div>
            </div>
          </div>';

          /* set count to zero */
          $count = 0;

          /* loop through each contextual_help content section */
          echo '<ul class="option-tree-setting-wrap option-tree-sortable" id="option_tree_settings_help" data-name="' . ot_settings_id(). '[contextual_help][content]">';

          if ( isset( $settings['contextual_help']['content'] ) ) {

            foreach( $settings['contextual_help']['content'] as $content ) {

              /* content */
              echo '<li class="ui-state-default list-contextual-help">' . ot_contextual_help_view( ot_settings_id() . '[contextual_help][content]',  $count, $content ) . '</li>';

              /* increment content count */
              $count++;

            }

          }

          echo '</ul>';

          echo '<a href="javascript:void(0);" class="option-tree-help-add option-tree-ui-button button hug-left">' . esc_html__( 'Add Contextual Help Content', 'uncode-core' ) . '</a>';
          //echo '<button class="option-tree-ui-button button button-primary right hug-right">' . esc_html__( 'Save Changes', 'uncode-core' ) . '</button>';

        echo '</div>';

      echo '</div>';

    echo '</form>';

  }

}


/**
 * Import Data option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_import_data' ) ) {

  function ot_type_import_data() {

    echo '<form method="post" id="import-data-form">';

      /* form nonce */
      wp_nonce_field( 'import_data_form', 'import_data_nonce' );

      /* format setting outer wrapper */
      echo '<div class="format-setting type-textarea has-desc">';

        /* description */
        echo '<div class="description">';

          if ( OT_SHOW_SETTINGS_IMPORT ) echo '<p>' . esc_html__( 'Only after you\'ve imported the Settings should you try and update your Theme Options.', 'uncode-core' ) . '</p>';

          echo '<p>' . esc_html__( 'To import your Theme Options copy and paste what appears to be a random string of alpha numeric characters into this textarea and press the "Import Theme Options" button.', 'uncode-core' ) . '</p>';

          if ( uncode_core_check_valid_purchase_code() ) {
	          /* button */
	          echo '<button class="option-tree-ui-button button button-primary right hug-right">' . esc_html__( 'Import Theme Options', 'uncode-core' ) . '</button>';
	      }

        echo '</div>';

        /* textarea */
        echo '<div class="format-setting-inner">';

          echo '<textarea rows="10" cols="40" name="import_data" id="import_data" class="textarea"></textarea>';

        echo '</div>';

      echo '</div>';

    echo '</form>';

  }

}

/**
 * Import Layouts option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_import_layouts' ) ) {

  function ot_type_import_layouts() {

    echo '<form method="post" id="import-layouts-form">';

      /* form nonce */
      wp_nonce_field( 'import_layouts_form', 'import_layouts_nonce' );

      /* format setting outer wrapper */
      echo '<div class="format-setting type-textarea has-desc">';

        /* description */
        echo '<div class="description">';

          if ( OT_SHOW_SETTINGS_IMPORT ) echo '<p>' . esc_html__( 'Only after you\'ve imported the Settings should you try and update your Layouts.', 'uncode-core' ) . '</p>';

          echo '<p>' . esc_html__( 'To import your Layouts copy and paste what appears to be a random string of alpha numeric characters into this textarea and press the "Import Layouts" button. Keep in mind that when you import your layouts, the active layout\'s saved data will write over the current data set for your Theme Options.', 'uncode-core' ) . '</p>';

          if ( uncode_core_check_valid_purchase_code() ) {
	          /* button */
	          echo '<button class="option-tree-ui-button button button-primary right hug-right">' . esc_html__( 'Import Layouts', 'uncode-core' ) . '</button>';
	      }

        echo '</div>';

        /* textarea */
        echo '<div class="format-setting-inner">';

          echo '<textarea rows="10" cols="40" name="import_layouts" id="import_layouts" class="textarea"></textarea>';

        echo '</div>';

      echo '</div>';

    echo '</form>';

  }

}

/**
 * Export Data option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_export_data' ) ) {

  function ot_type_export_data() {

    /* format setting outer wrapper */
    echo '<div class="format-setting type-textarea simple has-desc">';

      /* description */
      echo '<div class="description">';

        echo '<p>' . wp_kses(__( 'You can export or back up your Theme Options data by highlighting this text, copying it, and pasting it into a blank text file. Then you can simply paste it into the Options Utils > Import Theme Options text area on another website. This is also a way to create manual backups of your Theme Options quickly.', 'uncode-core' ), array( 'strong' => array( ), 'code' => array() ) ) . '</p>';

      echo '</div>';

      /* get theme options data */
      $data = get_option( ot_options_id() );
      $data = ! empty( $data ) ? ot_encode( serialize( $data ) ) : '';

      echo '<div class="format-setting-inner">';
        echo '<textarea rows="10" cols="40" name="export_data" id="export_data" class="textarea">' . $data . '</textarea>';
      echo '</div>';

    echo '</div>';

  }

}

/**
 * Export Layouts option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_export_layouts' ) ) {

  function ot_type_export_layouts() {

    /* format setting outer wrapper */
    echo '<div class="format-setting type-textarea simple has-desc">';

      /* description */
      echo '<div class="description">';

        echo '<p>' . wp_kses(__( 'Export your Layouts by highlighting this text and doing a copy/paste into a blank .txt file. Then save the file for importing into another install of WordPress later. Alternatively, you could just paste it into the <code>Options Utils->Settings->Import</code> <strong>Layouts</strong> textarea on another web site.', 'uncode-core' ), array( 'strong' => array( ), 'code' => array() ) ) . '</p>';


      echo '</div>';

      /* get layout data */
      $layouts = get_option( ot_layouts_id() );
      $layouts = ! empty( $layouts ) ? ot_encode( serialize( $layouts ) ) : '';

      echo '<div class="format-setting-inner">';
        echo '<textarea rows="10" cols="40" name="export_layouts" id="export_layouts" class="textarea">' . $layouts . '</textarea>';
      echo '</div>';

    echo '</div>';

  }

}

/**
 * Modify Layouts option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_modify_layouts' ) ) {

  function ot_type_modify_layouts() {

    echo '<form method="post" id="option-tree-settings-form">';

      /* form nonce */
      wp_nonce_field( 'option_tree_modify_layouts_form', 'option_tree_modify_layouts_nonce' );

      /* format setting outer wrapper */
      echo '<div class="format-setting type-textarea has-desc">';

        /* description */
        echo '<div class="description">';

          echo '<p>' . esc_html__( 'To add a new layout enter a unique lower case alphanumeric string (dashes allowed) in the text field and click "Save Layouts".', 'uncode-core' ) . '</p>';
          echo '<p>' . esc_html__( 'As well, you can activate, remove, and drag & drop the order; all situations require you to click "Save Layouts" for the changes to be applied.', 'uncode-core' ) . '</p>';
          echo '<p>' . esc_html__( 'When you create a new layout it will become active and any changes made to the Theme Options will be applied to it. If you switch back to a different layout immediately after creating a new layout that new layout will have a snapshot of the current Theme Options data attached to it.', 'uncode-core' ) . '</p>';
          if ( OT_SHOW_DOCS ) echo '<p>' . wp_kses(__( 'Visit <code>Options Utils->Documentation->Layouts Overview</code> to see a more in-depth description of what layouts are and how to use them.', 'uncode-core' ), array( 'code' => array() ) ) . '</p>';

        echo '</div>';

        echo '<div class="format-setting-inner">';

          /* get the saved layouts */
          $layouts = get_option( ot_layouts_id() );

          /* set active layout */
          $active_layout = isset( $layouts['active_layout'] ) ? $layouts['active_layout'] : '';

          echo '<input type="hidden" name="' . ot_layouts_id() . '[active_layout]" value="' . esc_attr( $active_layout ) . '" class="active-layout-input" />';

          /* add new layout */
          echo '<input type="text" name="' . ot_layouts_id() . '[_add_new_layout_]" value="" class="widefat option-tree-ui-input" autocomplete="off" />';

          /* loop through each layout */
          echo '<ul class="option-tree-setting-wrap option-tree-sortable" id="option_tree_layouts">';

          if ( is_array( $layouts ) && ! empty( $layouts ) ) {

            foreach( $layouts as $key => $data ) {

              /* skip active layout array */
              if ( $key == 'active_layout' )
                continue;

              /* content */
              echo '<li class="ui-state-default list-layouts">' . ot_layout_view( $key, $data, $active_layout ) . '</li>';

            }

          }

          echo '</ul>';

          if ( uncode_core_check_valid_purchase_code() ) {
	          echo '<button class="option-tree-ui-button button button-primary right hug-right">' . esc_html__( 'Save Layouts', 'uncode-core' ) . '</button>';
	      }

        echo '</div>';

      echo '</div>';

    echo '</form>';

  }

}

/* End of file ot-functions-settings-page.php */
/* Location: ./includes/ot-functions-settings-page.php */
