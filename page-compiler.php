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

		<section class="gutter d-flex flex-wrap flex-justify-between flex-items-top flex-content-stretch mb-6">

			<article class="col-12 col-lg-7">

				<label class="d-block mb-1" for="runquery">1. Enter your program:</label>
				<div class="mb-3 position-relative">
					<textarea 
						name="programcontent" 
						id="programcontent"
						class="form-control text-mono position-absolute top-0 text-transparent bg-transparent border-0 caret-gray-light p-3 lh-default resize-none"
						autocorrect="off" 
						autocapitalize="off" 
						spellcheck="false"
						rows="24" ></textarea>
					<pre class="d-block top-0 p-3 m-0"><code id="programcode" lang="prolog" class="language-prolog d-block width-full"></code></pre>
				</div>

				<div class="d-flex flex-wrap flex-justify-between flex-items-middle">
						<label>or upload a file:</label> <input name="programfile" id="programfile" type="file" size="50" accept=".pl,.PL"> 
						<button class="btn btn-primary" name="programconsult" id="programconsult">Consult</button>
				</div>

			</article>

			<article class="col-12 col-lg-5">

				<div class="mb-3">
					<label class="d-block mb-1" for="runquery">2. Run a query:</label>

					<div class="d-flex flex-wrap flex-justify-between flex-items-middle">
						<input class="form-control input-monospace flex-auto width-auto mr-2" name="querycontent" id="querycontent" type="text">
						<button class="btn btn-blue" name="runquery" id="queryrun">run</button>
					</div>
				</div>

				<label class="d-block mb-1" for="output">3. Take a look at the output:</label>
				<div id="output" class="text-mono bg-gray-1 mb-3"></div>

				<label class="d-block mb-1" for="verifyFile">4. Verify it with one of our test scripts: <span class="text-red">(under construction)<span></label>
				<div class="d-flex flex-wrap flex-justify-between flex-items-middle">
						<select id="verifyFile" name="verifyFile" class="form-select flex-auto width-auto mr-2">
							<option default>choose one.</option>
							<option>001. Familiendatenbank</option>
							<option>002. --- TBD ---</option>
							<option>003. --- TBD ---</option>
							<option>004. --- TBD ---</option>
							<option>005. --- TBD ---</option>
						</select>
						<button class="btn btn-purple" name="verifyRun" id="verifyRun">verify</button>
					</div>
			</article>

		</section>

		<section class="p-3 bg-gray-light">

			<h3>Resources:</h3>

			<strong>Prolog-Interpreter:</strong> <a href="http://tau-prolog.org/" target="_blank">Tau Prolog</a>, a Prolog interpreter fully implemented in JavaScript, released under the BSD 3-Clause License.<br />
			<strong>Syntax-Highlighter:</strong> <a href="https://prismjs.com/" target="_blank">Prism</a>, a lightweight, extensible syntax highlighter, released under the MIT License. <br />
			<strong>Component-Design-System:</strong> <a href="https://primer.style/" target="_blank">Primer</a>, GitHub’s modular design system, released under the MIT License.

		</section>

		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tau-prolog@0.2.66/modules/core.min.js"></script>

	</main>
<?php get_footer(); ?>