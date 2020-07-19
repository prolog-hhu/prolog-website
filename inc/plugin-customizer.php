<?
/**
 * Retrieve support languages
 * @return array Hash of lang => language
 */
function cl_prolog_get_supported_languages() {
	
	$languages = array(
		"bash" => "Bash/Shell",
		"haskell" => "Haskell",
		"markup" => "HTML",
		"java" => "Java",
		"javascript" => "JavaScript",
        "php" => "PHP",
        "prolog" => "Prolog",
		"python" => "Python",
	);

	/**
	 * Filter the list of supported languages for the Syntax Highlighting colors.
	 * Use this filter to shorten or extend the language shown in the editor interface.
	 
	 * The array key must match a Prism's supported alias, the array value is a descriptive
	 * field. For languages and aliases see: https://prismjs.com/#supported-languages
	 *
	 * @since 1.1.0
	 *
	 * @param string $languages Array of languages supported
	 */
	return apply_filters( 'mkaz_code_syntax_language_list', $languages );
}