<?php
/**
 * Yii Less Compiler
 * This is a Yii application component which wrappes lessphp by Leaf Corcoran
 *
 * @author Inpassor <inpassor@mail.ru>
 * @author Leaf Corcoran <leafot@gmail.com>
 * @link https://github.com/Inpassor/Yii_LessCompiler
 * @link http://leafo.net/lessphp
 *
 * @version 0.3 (2013.10.08)
 */

require_once(dirname(__FILE__).'/LessCompiler/lessc.inc.php');

class LessCompiler extends CApplicationComponent
{

	// path to store compiled css files
	// defaults to 'application.assets.css'
	public $compiledPath=null;

	// compiled output formatter
	// accepted values: 'lessjs' , 'compressed' , 'classic'
	// defaults to 'lessjs'
	// read http://leafo.net/lessphp/docs/#output_formatting for details
	public $formatter='lessjs';

	// passing in true will cause the input to always be recompiled
	public $forceCompile=false;

	// if set to true, compileFile method will compile .less to .css ONLY if output .css file not found
	// otherwise compileFile method will only return path and filename of existing .css file
	// this mode is for production
	public $disabled=false;

	private $lessc=null;

	public function init()
	{
		if (!$this->compiledPath)
		{
			$this->compiledPath='application.assets.css';
		}

		$alias=YiiBase::getPathOfAlias($this->compiledPath);
		if ($alias)
		{
			$this->compiledPath=$alias;
		}
		elseif (!is_dir($this->compiledPath))
		{
			$this->compiledPath=Yii::app()->basePath.'/assets/css';
		}

		if ($this->formatter!='lessjs'&&$this->formatter!='compressed'&&$this->formatter!='classic')
		{
			$this->formatter='lessjs';
		}

		$this->lessc=new lessc;
		$this->lessc->setFormatter($this->formatter);
	}

	public function compileFile($file,$fileOut='',$useCompiledPath=true)
	{
		if (!$fileOut)
		{
			$fileOut=basename($file,'.less').'.css';
		}
		if ($useCompiledPath)
		{
			$fileOut=$this->compiledPath.'/'.$fileOut;
		}

		$compile=false;

		if (!$this->forceCompile&&!$this->disabled)
		{
			$files=Yii::app()->cache->get('less-compiler-'.$file.'-updated');
			if ($files&&is_array($files))
			{
				foreach ($files as $_file=>$_time)
				{
					if (filemtime($_file)!=$_time)
					{
						$compile=true;
						break;
					}
				}
			}
			unset($files);
		}

		if (!file_exists($fileOut)||$compile||$this->forceCompile)
		{
			$cache=$this->lessc->cachedCompile($file);
			file_put_contents($fileOut,$cache['compiled']);
			Yii::app()->cache->set('less-compiler-'.$file.'-updated',$cache['files']);
		}

		return $fileOut;
	}

	public function compile($css)
	{
		if (is_file($css))
		{
			return $this->lessc->compileFile($css);
		}
		else
		{
			return $this->lessc->compile($css);
		}
	}

}

?>
