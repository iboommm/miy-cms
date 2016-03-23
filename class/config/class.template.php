<?php 
	class Template {
		private $title;
		private $keyword;
		private $description;
		private $author;
		private $script;
		private $render;
		private $theme;

		function setTitle($title) {
			$this->title = $title;
		}
		function setKeyword($keyword) {
			$this->keyword = $keyword;
		}
		function setDescription($description) {
			$this->description = $description;
		}
		function setAuthor($author) {
			$this->author = $author;
		}
		function setRender($render) {
			$this->render = $render;
		}
		function setScript($script) {
			$this->script = $script;
		}
		function setTheme() {
			$this->theme = $theme;
		}
		function getTitle() {
			return $this->title;
		}
		function getKeyword() {
			return $this->keyword;
		}
		function getDescription() {
			return $this->description;
		}
		function getAuthor() {
			return $this->author;
		}
		function getRender() {
			return $this->render;
		}
		function getScript() {
			include "template/".getTheme()."/header_script.php";
		}
		function getTheme() {
			return $this->theme;
		}

		function renderPage(){
			print "<!DOCTYPE html>\n";
			print "<html>\n";
			print "<head>\n";
			print "<title>".$this->title."</title>\n";
			print "".$this->getScript()."\n";
			print "<meta name=\"description\" content=\"".$this->getDescription()."\">\n";
			print "<meta name=\"keywords\" content=\"".$this->getKeyword()."\">\n";
			print "<meta name=\"author\" content=\"".$this->getAuthor()."\">\n";
			print "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\">\n";
			print "</head>\n";
			print "<body>\n";
			print "".$this->getRender()."\n";
			print "</body>\n";
			print "</html>\n";

		}
	}
 ?>