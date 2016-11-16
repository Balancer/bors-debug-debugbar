<?php

namespace B2\Debug;

use DebugBar\StandardDebugBar;

class DebugBar
{
	var $debugbar;
	var $debugbarRenderer;

	static function instance()
	{
		static $instance = NULL;
		if(!$instance)
		{
			$debugbar = new StandardDebugBar();
			$debugbarRenderer = $debugbar->getJavascriptRenderer();

			$instance = new DebugBar;

			$instance->debugbar = $debugbar;
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

	static function bors_register_in_view($view)
	{
		$view->append_head(self::class);
		$view->append_body(self::class);
	}
}
