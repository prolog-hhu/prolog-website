<?php
/**
 * Template Name: Compiler Page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

<?php get_header(); ?>

	<main class="container-xl px-3 py-6">

		<?php // get post content
			if ( have_posts() ) {
				// Load posts loop.
				while ( have_posts() ) {
					the_post();
					
					get_template_part( 'template-parts/content/content' );
				}
			}
		?>

		<section class="gutter d-flex flex-wrap flex-justify-between flex-items-top mb-4">

			<article class="col-12 col-md-6">

				<div class="mb-3 position-relative">
					<textarea 
						name="programcontent" 
						id="programcontent"
						class="form-control input-monospace position-absolute top-0 text-transparent bg-transparent p-3 lh-default"
						autocorrect="off" 
						autocapitalize="off" 
						spellcheck="false"
						rows="24" ></textarea>
					<pre class="d-block top-0 p-3 m-0"><code id="programcode" lang="prolog" class="language-prolog d-block width-full"></code></pre>
				</div>

				<div class="mb-3">
					<label class="f5 d-block" for="programfile">Program upload:</label>
					<input name="programfile" id="programfile" type="file" size="50" accept="text/*"> 
				</div>

				<button class="btn btn-primary" name="programconsult" id="programconsult">Consult</button>

			</article>

			<article class="col-12 col-md-6">

				<div class="mb-3">
					<label class="f5 d-block" for="runquery">Query:</label>

					<div class="d-flex flex-wrap flex-justify-between flex-items-middle">
						<input class="form-control input-monospace flex-auto width-auto" name="querycontent" id="querycontent" type="text">
						<button class="btn btn-purple" name="runquery" id="queryrun">run</button>
					</div>
				</div>

				<label class="f5 d-block" for="output">Output:</label>
				<div id="output" class="height-stretch"></div>

			</article>

		</section>

		<section class="p-3 bg-gray-light">

			<h3>Resources:</h3>

			<strong>Compiler:</strong> <a href="http://tau-prolog.org/" target="_blank">Tau Prolog</a>, a Prolog interpreter fully implemented in JavaScript, released under the BSD 3-Clause License.<br />
			<strong>Syntax-Highlighter:</strong> <a href="https://prismjs.com/" target="_blank">Prism</a>, a lightweight, extensible syntax highlighter, released under the MIT License.

		</section>

		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tau-prolog@0.2.66/modules/core.min.js"></script>

		<script type="text/javascript">

			  document.addEventListener("DOMContentLoaded", function(event) {

				let programCode = document.getElementById('programcode');
				let programcontent = document.getElementById('programcontent');

				programCode.parentElement.style.height = programcontent.clientHeight + 'px';
				
				function highlight() {
					programCode.innerHTML = Prism.highlight(programcontent.value, Prism.languages.prolog, 'prolog');
					programCode.parentElement.style.height = programcontent.clientHeight + 'px';
				}
				programcontent.addEventListener("keyup", highlight, false);
			 });
		</script>

	</main>
<?php get_footer(); ?>