<?php

use DebugBar\StandardDebugBar;

namespace B2\Debug;

class DebugBar
{
	var $debugbarRenderer;

	static function instance()
	{
		static $instance = NULL;
		if(!$instance)
		{
			$debugbar = new StandardDebugBar();
			$debugbarRenderer = $debugbar->getJavascriptRenderer();

			$instance = new DebugBar;
			$instance->debugbarRenderer = $debugbarRenderer;
		}

		return $instance;
	}

	function head()
	{
		return $this->debugbarRenderer->renderHead();
	}

	function body()
	{
		return $this->debugbarRenderer->render();
	}
}
