<?php

require_once SYSTEM.'controller.php';
require_once SYSTEM.'actions.php';
require_once SYSTEM.'view_response.php';
require_once SYSTEM.'redirect_response.php';

require_once MODEL.'user_channel.php';
require_once MODEL.'video.php';

class AdminController extends Controller {

	public function __construct() {
		$this->denyAction(Action::GET);
		$this->denyAction(Action::CREATE);
		$this->denyAction(Action::UPDATE);
		$this->denyAction(Action::DESTROY);
	}

	public function index($request) {
		if(!Session::isActive())
			return new RedirectResponse(WEBROOT.'login');

		return $this->dashboard($request);
	}

	public function dashboard($request) {
		if(Session::get()->isModerator() || Session::get()->isAdmin()) {
			$data = array();

			$data['currentPage'] = 'admin';
			$data['current'] = 'dashboard';

			$data['rankStr'] = Session::get()->isModerator() ? 'Moderateur' : 'Admin';
			$data['isModo'] = Session::get()->isModerator();
			$data['isAdmin'] = Session::get()->isAdmin();
			$data['user'] = Session::get();
			$data['reportedVidsCount'] = Video::count(array('conditions' => array('flagged', 1)));
			$data['reportedCommentsCount'] = Comment::count(array('conditions' => array('flagged', 1)));;

			return new ViewResponse('admin/dashboard', $data, true, 'layouts/admin.php');
		}
		else
			return Utils::getUnauthorizedResponse();
	}

	public function videos($request, $type = 'all') {
		if(Session::get()->isModerator() || Session::get()->isAdmin()) {
			$data = array();

			$data['currentPage'] = 'admin';
			$data['current'] = 'videos';

			$data['rankStr'] = Session::get()->isModerator() ? 'Moderateur' : 'Admin';
			$data['isModo'] = Session::get()->isModerator();
			$data['isAdmin'] = Session::get()->isAdmin();

			$data['type'] = $type;

			if($type == 'flagged'){
				$data['vids'] = Video::getReportedVideos();
			} else {
				$data['vids'] = Video::find('all');
			}

			return new ViewResponse('admin/videos', $data, true, 'layouts/admin.php');
		}
		else
			return Utils::getUnauthorizedResponse();
	}

	public function channels($request) {
		if(Session::get()->isModerator() || Session::get()->isAdmin()) {
			$data = array();

			$data['currentPage'] = 'admin';
			$data['current'] = 'channels';

			$page = $request->getParameter('p') ? Utils::secure($request->getParameter('p')) : 1;
			$channelNumber = UserChannel::count('all');

			$data['rankStr'] = Session::get()->isModerator() ? 'Moderateur' : 'Admin';
			$data['isModo'] = Session::get()->isModerator();
			$data['isAdmin'] = Session::get()->isAdmin();
			$data['user'] = Session::get();
			$data['channels'] = UserChannel::find('all');

			return new ViewResponse('admin/channels', $data, true, 'layouts/admin.php');
		}
		else
			return Utils::getUnauthorizedResponse();
	}

	public function comments($request) {
		if(Session::get()->isModerator() || Session::get()->isAdmin()) {
			$data = array();

			$data['currentPage'] = 'admin';
			$data['current'] = 'comments';

			$page = $request->getParameter('p') ? Utils::secure($request->getParameter('p')) : 1;
			$channelNumber = UserChannel::count('all');

			$data['rankStr'] = Session::get()->isModerator() ? 'Moderateur' : 'Admin';
			$data['isModo'] = Session::get()->isModerator();
			$data['isAdmin'] = Session::get()->isAdmin();
			$data['user'] = Session::get();
			$data['comments'] = Comment::getReportedComments();

			return new ViewResponse('admin/comments', $data, true, 'layouts/admin.php');
		}
		else
			return Utils::getUnauthorizedResponse();
	}

	// Denied actions
	public function get($id, $request) {}
	public function create($request) {}
	public function update($id, $request) {}
	public function destroy($id, $request) {}

}