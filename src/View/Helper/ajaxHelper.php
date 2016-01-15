<?php
namespace App\View\Helper;
use Cake\View\Helper;

class ajaxHelper extends Helper
{
    
    /**
     * Included helpers.
     *
     * @var array
     * @access public
     */
    	//var $helpers = array('Html','Javascript');    
     /**
     * Names of AJAX options.
     *
     * @var array
     * @access public
     */
     public $ajaxOptions = array('type', 'confirm', 'condition', 'before', 'after', 'fallback', 'update', 'loading', 'loaded', 'interactive', 'complete', 'with', 'url', 'method', 'position', 'form', 'parameters', 'evalScripts', 'asynchronous', 'onComplete', 'onUninitialized', 'onLoading', 'onLoaded', 'onInteractive', 'success', 'failure', 'onSuccess', 'onFailure', 'insertion', 'requestHeaders');
     
     /**
     * Options for auto-complete editor.
     *
     * @var array
     * @access public
     */
	 public $autoCompleteOptions = array('paramName', 'tokens', 'frequency', 'minChars', 'indicator', 'updateElement', 'afterUpdateElement', 'onShow', 'onHide');
    
    
    /**
     * Private Method to return a string of html options
     * option data as a JavaScript options hash.
     *
     * @param array $options	Options in the shape of keys and values
     * @param array $extra	Array of legal keys in this options context
     * @return array Array of html options
     * @access private
     */
     public function __getHtmlOptions($options, $extra = array()) {
		foreach ($this->ajaxOptions as $key) {
			if (isset($options[$key])) {
				unset($options[$key]);
			}
		}

		foreach ($extra as $key) {
			if (isset($options[$key])) {
				unset($options[$key]);
			}
		}
		return $options;
	}
    
    /**
     * Protected Method to return a string of JavaScript with a string representation
     * of given options array.
     *
     * @param array $options	Ajax options array
     * @param array $stringOpts	Options as strings in an array
     * @access private
     * @return array
     * @access protected
     */
     public function _optionsToString($options, $stringOpts = array()) {
    	foreach ($stringOpts as $option) {
    		if (isset($options[$option]) && !$options[$option][0] != "'") {
    			if ($options[$option] === true || $options[$option] === 'true') {
    				$options[$option] = 'true';
    			} elseif ($options[$option] === false || $options[$option] === 'false') {
    				$options[$option] = 'false';
    			} else {
    				if($options[$option][0] == "'")
    					$options[$option] = $options[$option];
    				else
    					$options[$option] = "'{$options[$option]}'";
    			}
    		}
    	}
    	return $options;
    }
    
    /**
     * Protected Method to return a string of JavaScript with the given
     * option data as a JavaScript options hash.
     *
     * @param array $options	Options in the shape of keys and values
     * @param array $acceptable	Array of legal keys in this options context
     * @return string	String of Javascript array definition
     * @access protected
     */
    public function _buildOptions($options, $acceptable) {
    	if (is_array($options)) {
    		$out = array();
    
    		foreach ($options as $k => $v) {
    			if (in_array($k, $acceptable)) {
    				$out[] = "$k:$v";
    			}
    		}
    
    		$out = join(', ', $out);
    		$out = '{' . $out . '}';
    		return $out;
    	} else {
    		return false;
    	}
    }
    
      
    /**************************************************************************/
    /* function linkjq
    *   Esta funcion genera un enlace que puede cargar el 
    *   contenido de una vista mediante url.
    *  
    * @args 
    * $title: texto visible del enlace
    * $href: url del enlace
    * $options: opciones disponibles =>
    *       ##$options['target']:## id del elemento donde se cargara
    *       el nuevo contenido (por defecto, se cargará en el mismo elemento)
    *       ##$options['url']:## url de la vista (si no se define se usuara $href)
    *
    /****************************************************************************/
    public function link($title, $href = null, $options = array(), $confirm = null, $escapeTitle = true) {
		if (!isset($href)) {
			$href = $title;
		}

		if (!isset($options['url'])) {
			$options['url'] = $href;
		}

		if (isset($confirm)) {
			$options['confirm'] = $confirm;
			unset($confirm);
		}
        
		$htmlOptions = $this->__getHtmlOptions($options);

		if (empty($options['fallback']) || !isset($options['fallback'])) {
			$options['fallback'] = $href;
		}

		if (!isset($htmlOptions['id'])) {
			$htmlOptions['id'] = 'link' . intval(rand());
		}

		if (!isset($htmlOptions['onclick'])) {
			$htmlOptions['onclick'] = '';
		}
		if (!isset($options['update'])) {
			$options['update'] = $htmlOptions['id'];
		}
		$rawlink = $this->Html->link($title, $href, $htmlOptions, null, $escapeTitle);
        $url_tmp = explode('href="', $rawlink);
        $url_tmp = explode('"', $url_tmp[1]);
        $url_tmp = $url_tmp[0];
        $htmlOptions['onclick'] .= "event.preventDefault();jQuery('#".$options['update']."').load('".$url_tmp."');return false;";
        $return = $this->Html->link($title, $url_tmp[0], $htmlOptions, null, $escapeTitle);

		return $return;
	}
    
    
    /**
     * Create a text field with Autocomplete.
     *
     * Creates an autocomplete field with the given ID and options.
     *
     * options['with'] defaults to "Form.Element.serialize('$field_id')",
     * but can be any valid javascript expression defining the
     *
     * @link http://wiki.script.aculo.us/scriptaculous/show/Ajax.Autocompleter
     * @param string $field_id DOM ID of field to observe
     * @param string $url URL for the autocomplete action
     * @param array $options Ajax options
     * @return string Ajax script
     * @access public
     */
    public function autoComplete($field, $url = "", $options = array()) {
        $var = '';
        if (isset($options['var'])) {
        	$var = 'var ' . $options['var'] . ' = ';
        	unset($options['var']);
        }
        
        if (!isset($options['id'])) {
        	$options['id'] = Inflector::camelize(r("/", "_", $field));
        }
        $divOptions = array('id' => $options['id'] . "_autoComplete", 'class' => isset($options['class']) ? $options['class'].' auto_complete' : 'auto_complete');
        
        if (isset($options['div_id'])) {
        	$divOptions['id'] = $options['div_id'];
        	unset($options['div_id']);
        }
        $htmlOptions = $this->__getHtmlOptions($options);
        $htmlOptions['autocomplete'] = "off";
        
        foreach ($this->autoCompleteOptions as $opt) {
        	unset($htmlOptions[$opt]);
        }
        
        if (isset($options['tokens'])) {
        	if (is_array($options['tokens'])) {
        		$options['tokens'] = $this->Javascript->object($options['tokens']);
        	} else {
        		$options['tokens'] = '"' . $options['tokens'] . '"';
        	}
        }
        
        if(!isset($options['minLength'])){
            $options['minLength']="3";
        }
        $inputfield = str_replace("/", "", $field);
        if(is_array($url)){
           $source = $url; 
        }else{
            $source ="'".$this->Html->url($url)."'";
        }
        
        
        $jq_codeB="$( \"#".$inputfield."\" ).autocomplete({
          source: function( request, response ) {
                var ajaxResponse;
                $.ajax({
                    url: $source,
                    type:'POST',
                    async: false, 
                    data:{ value : request['term']},
                    success: function( response, status, xhr ) {
                        tmp_rps=response.split('<!--');
                        response = tmp_rps[0];
                        response = response.replace(/\"/g,'');
                        response = response.replace('[','');
                        response = response.replace(']','');
                        ajaxResponse = response.split(',');
                    }
                    });
                    if(ajaxResponse.length>0){
                        response(ajaxResponse);
                    }
                    
            },
          minLength: 3
        });";
        
        $options = $this->_optionsToString($options, array('paramName', 'indicator'));//
        $options = $this->_buildOptions($options, $this->autoCompleteOptions);//
        //return $this->Html->input($field, $htmlOptions) . "\n" .
        //$this->Html->tag('div', $divOptions, true) . "</div>\n" .
        //$this->Javascript->codeBlock("{$var}new Ajax.Autocompleter('" . $htmlOptions['id']
        //. "', '" . $divOptions['id'] . "', '" . $this->Html->url($url) . "', " .
        //$options . ");");
        return $this->Html->input($field, $htmlOptions) . "\n" .
        		$this->Html->tag('div', $divOptions, true) . "</div>\n" .
        		$this->Javascript->codeBlock($jq_codeB);//OK
    }
    
    function observeField($field_id,$target_id, $href, $options = array()){
        if (!isset($options['url'])) {
			$options['url'] = $href;
		}
        $htmlOptions = $this->__getHtmlOptions($options);
        $title="";
        $escapeTitle="";
        $rawlink = $this->Html->link($title, $href, $htmlOptions, null, $escapeTitle);
        $url_tmp = explode('href="', $rawlink);
        $url_tmp = explode('"', $url_tmp[1]);
        $url_tmp = $url_tmp[0];
        
        $jsBlock="$('#".$field_id."').keyup(function(){";
        $jsBlock.="$('#".$target_id."').load('".$url_tmp."',{value:$('#".$field_id."').val()})";   
        $jsBlock.="})";
        return $this->Javascript->codeBlock($jsBlock);        
        
        
    }
     
    
}
?>