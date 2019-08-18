<?php
/*-------------------------------
** PAGES
**-------------------------------*/
switch( trim($url_path) ){
  case "{$base}member/login":
		$this->admin_load('login');
		break;

  case "{$base}member/signup":
		$this->admin_load('signup');
		break;

  case "{$base}member/dashboard":
		$this->admin_load('dashboard');
		break;

  case "{$base}member/confirmation":
		$this->admin_load('confirmation');
		break;

  case "{$base}member/logout":
		$this->admin_load('logout');
		break;

  case "{$base}member/password/lost":
		$this->admin_load('lostPassword');
		break;

  case "{$base}member/profile":
		$this->admin_load('profile');
		break;
}
