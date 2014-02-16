<?php

class MenuItem{

	public $id;
	public $property;
	public $type;
	public $url;
	public $action;
	public $title;
	
	public function getHtml(){
	
		if($this->type == "account"){
			$html .= '<div class="nav-divider">&nbsp;</div>
					  <div class="showhide-account">
						<img id="'.$this->id.'" src="./libs/panel/images/shared/nav/nav_myaccount.gif" width="93" height="14" />
					  </div>';
		}
		else if($this->type == "logout"){
			$html .= '<div class="nav-divider">&nbsp;</div>
						<a id="'.$this->id.'"><img src="./libs/panel/images/shared/nav/nav_logout.gif" /></a>';
		}
		else if($this->type == "default"){
			$html .= '<ul class="select"><li><a href="?page='.$this->href.'"><b>'.$this->title.'</b></a>';
			$html .= '</li></ul>';
		}
		
		return $html;
	}
	
	public function getJS(){
	
		if(isset($this->action) && $this->action != ""){
			$js = "$(document).ready(function(){
					$('#".$this->id."').click(function(){
						$('form').append('<input id=\"action\" name=\"action\" type=\"hidden\" value=\"".$this->action."\"  />');
						$('form').submit();
						$('#action').remove();
					});
				});";
		}
		else if(isset($this->href) && $this->href != ""){
			$js = "$(document).ready(function(){
					$('#".$this->id."').click(function(){
						location = '?page=".$this->href."';
					});
				});";
		}
		
		return $js;
	}
}