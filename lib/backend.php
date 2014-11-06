<?php



// function remove_menus(){
  
//   remove_menu_page( 'index.php' );                  //Dashboard
//   remove_menu_page( 'edit.php' );                   //Posts
//   // remove_menu_page( 'edit.php?post_type=page' );    //Pages
//   remove_menu_page( 'edit-comments.php' );          //Comments
//   // remove_menu_page( 'themes.php' );                 //Appearance
//   // remove_menu_page( 'plugins.php' );                //Plugins
//   // remove_menu_page( 'users.php' );                  //Users
//   // remove_menu_page( 'tools.php' );                  //Tools
//   // remove_menu_page( 'options-general.php' );        //Settings
  
// }
// add_action( 'admin_menu', 'remove_menus' );


// remove unnecessary menus
function remove_admin_menus () {
	global $menu;

	// all users
	$restrict = explode(',', 'Links,Kommentare,Beiträge');
	
	// non-administrator users
	$restrict_user = explode(',', 'Media,Profile,Appearance,Plugins,Users,Tools,Settings');

	// WP localization
	$f = create_function('$v,$i', 'return __($v);');
	array_walk($restrict, $f);
	if (!current_user_can('activate_plugins')) {
		array_walk($restrict_user, $f);
		$restrict = array_merge($restrict, $restrict_user);
	}

	// remove menus
	end($menu);
	while (prev($menu)) {
		$k = key($menu);
		$v = explode(' ', $menu[$k][0]);
		if(in_array(is_null($v[0]) ? '' : $v[0] , $restrict)) unset($menu[$k]);
	}

}
add_action('admin_menu', 'remove_admin_menus');
