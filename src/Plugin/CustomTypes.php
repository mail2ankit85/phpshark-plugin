<?php
//========================================================================================
//EXAMPLES - Register Type
//========================================================================================
// $this->create_{CPT_NAME}();
//========================================================================================
//EXAMPLES
//========================================================================================
//========================================================================================
//EXAMPLES - CPT Logic
//========================================================================================
// Our custom post type function
// public function create_{CPT_NAME}() {
// 	$article = new \WP\PHPSharkCustomPostType;
// 	$article->createPost(
// 		'{Text-Domain}',
// 		'{CPT_NAME}', //Cammel case {CPT_NAME}
// 		'{CPT_NAME}', //Cammel case {CPT_NAME}
// 		'{PROJECT_NAME}',  //project
// 		'{DASHICON}', //dashicon
// 		['title', 'excerpt', 'thumbnail', 'revisions', 'editor', 'comments'],
// 		['{CPT_SLUG}']
// 	);
//
// 	$catagory = new \WP\PHPSharkCustomTaxonomy;
// 	$catagory->createTaxonomyCategory(
// 		'{Text-Domain}',
// 		'{CPT_CATEGORY_NAME}', //Cammel case {CPT_CATEGORY_NAME}
// 		'{CPT_CATEGORY_NAME}', //Cammel case {CPT_CATEGORY_NAME}
// 		'{PROJECT_NAME}',
// 		'{CPT_NAME}'
// 	);
//
// 	$tags = new \WP\PHPSharkCustomTaxonomy;
// 	$tags->createTaxonomyTag(
// 		'{Text-Domain}',
// 		'{CPT_TAG_NAME}'', //Cammel case {CPT_CATEGORY_NAME}
// 		'{CPT_TAG_NAME}',  //Cammel case {CPT_CATEGORY_NAME}
// 		'{PROJECT_NAME}',
// 		'{CPT_NAME}'
// 	);
// }
//========================================================================================
//EXAMPLES
//========================================================================================
namespace Src\Plugin;
class CustomTypes{
	public function register(){}
}
