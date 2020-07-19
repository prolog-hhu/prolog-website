<?php
/**
* Filter the list of supported languages for the Syntax Highlighting colors.
* Use this filter to shorten or extend the language shown in the editor interface.
 
* The array key must match a Prism's supported alias, the array value is a descriptive
* field. For languages and aliases see: https://prismjs.com/#supported-languages
*
*
* @param string $languages Array of languages supported
*/
add_filter( 'mkaz_code_syntax_language_list', function() {
    return array(
		"bash" => "Bash/Shell",
		"haskell" => "Haskell",
		"markup" => "HTML",
		"java" => "Java",
		"javascript" => "JavaScript",
        "php" => "PHP",
        "prolog" => "Prolog",
		"python" => "Python",
	);  	
} );

/**
* Select default language
*/
add_filter( 'mkaz_code_syntax_default_lang', function() { return 'prolog'; });

?>