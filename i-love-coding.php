<?php
   /*
   Plugin Name: I Love Coding
   Plugin URI: http://ilovecoding.nghia
   Description: this plugin will add custom column to media library
   Version: 1.0
   Author: Nghia Diep
   Author URI: http://nghia.me
   License: GPL2
   */
   //abc
   // check if class named I_Love_Coding doesn't exists
   if( !class_exists( 'I_Love_Coding' ) )
   {
   		// if it doesn't exists we will create one below
   		class I_Love_Coding 
   		{
   			function __construct()
   			{
   				// add hook_custom_column function to admin_init action
   				// add_action( 'admin_init', 'hook_custom_column');
   				
   				// Add the column
				add_filter( 'manage_media_columns', 'add_custom_columns');
				
				add_action( 'manage_media_custom_column', 'fill_media_columns', 10, 2 );
				
				

				function add_custom_columns( $columns ) {
				    $columns['customcolumn'] = 'Custom Column';
				    return $columns;
				}

				function fill_media_columns( $column_name, $id ) {
				    switch ( $column_name ) {
				        case 'customcolumn' :
				            echo '<input type="checkbox"> It is protected<br>';
				            echo '<a href="#" onclick="return helloWorld();">Configure private urls</a>';
				            echo '<script>
								function helloWorld() {
									alert("Hello World");
								}
				            </script>';

				            echo '<style>
								.wp-list-table:hover {
									background-color: violet;
								}
				            </style>';
				        break;
				    }
				}

				
   			}
   			// end construct
   		}
   }
   // end class

   // function to load I_Love_Coding plugin
   function ilcd_load()
   {
	   	global $ilcd;
	   	$ilcd = new I_Love_Coding();
   }

   add_action('admin_init', 'ilcd_load');
?>
