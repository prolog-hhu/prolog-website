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

		<div class="gutter d-flex flex-wrap flex-justify-between flex-items-top">

			<div class="col-12 col-md-6">

				<div class="mb-3">
					<label class="f5 d-block" for="programcontent">Program:</label>
					<pre><code id="programcode" lang="prolog" class="language-prolog d-block" contenteditable></code></pre>
					<textarea 
						name="programcontent" 
						id="programcontent"
						class="form-control input-monospace"
						autocorrect="off" 
						autocapitalize="off" 
						spellcheck="false"
						rows="24" ></textarea>
				</div>

				<div class="mb-3">
					<label class="f5 d-block" for="programfile">Program upload:</label>
					<input name="programfile" id="programfile" type="file" size="50" accept="text/*"> 
				</div>

				<button class="btn btn-primary" name="programconsult" id="programconsult">Consult</button>

			</div>

			<div class="col-12 col-md-6">

				<div class="mb-3">
					<label class="f5 d-block" for="runquery">Query:</label>

					<div class="d-flex flex-wrap flex-justify-between flex-items-middle">
						<input class="form-control input-monospace flex-auto width-auto" name="querycontent" id="querycontent" type="text">
						<button class="btn btn-purple" name="runquery" id="queryrun">run</button>
					</div>
				</div>


				<label class="f5 d-block" for="output">Output:</label>
				<div id="output" class="height-stretch">
				</div>

			</div>

		</div>

		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tau-prolog@0.2.66/modules/core.min.js"></script>

		<script type="text/javascript">

			// create new prolog session
			let prologSession = pl.create();

			// get elements for consulting
			let programContent = document.getElementById('programcontent');
			let programFile = document.getElementById('programfile');
			let programConsult = document.getElementById('programconsult');

			// get elements for querying
			let queryContent = document.getElementById('querycontent');
			let queryRun = document.getElementById('queryrun');

			let output = document.getElementById('output');


			// consult function
			function consult() {

				console.log(programContent.value);
				let result = prologSession.consult(programContent.value); 

				console.log(result);

				if(result === true) {
					return toOutput('parsing program: success.', 'succ');
				} else {
					return toOutput(result, 'error');
				}
			}
			programConsult.addEventListener("click", consult, false);


			// consult query function
			function query() {

				console.log(queryContent.value);
				let result = prologSession.query(queryContent.value); 

				console.log(result);

				if(result.id == "throw") {
					return toOutput(result, 'error');
				};

				let callback = function(answer) { 

					console.log(answer)
					toOutput(pl.format_answer(answer), 'none');
				};
				prologSession.answer(callback);
			}
			queryRun.addEventListener("click", query, false);
			

			// helper: create output
			function toOutput(input, type) {

				let node = document.createElement("span");
				node.className += "d-block mb-2";

				if(type == 'error') {
					node.className += ' text-red border border-red p-2';
				} else if(type == 'succ') {
					node.className += ' text-green border border-green p-2';
				}

				let text = document.createTextNode(input);  
				node.appendChild(text);     
				
				output.insertAdjacentElement('afterbegin', node);
			}


			function getFile(event) {

				const input = event.target;

				if ('files' in input && input.files.length > 0) {
					placeFileContent(programContent, input.files[0])
				}
			}
			programFile.addEventListener('change', getFile);


			function placeFileContent(target, file) {

				readFileContent(file).then(content => {
					target.value = content
				}).catch(error => console.log(error));
			}

			function readFileContent(file) {

				const reader = new FileReader();

				return new Promise((resolve, reject) => {
					reader.onload = event => resolve(event.target.result)
					reader.onerror = error => reject(error)
					reader.readAsText(file)
				})
			}

		</script>
		<script>
			  document.addEventListener("DOMContentLoaded", function(event) {

				let programCode = document.getElementById('programcode');
				
				function highlight() {
					Prism.highlight(programCode, Prism.languages.prolog, 'prolog');
				}
				programCode.addEventListener("keyup", highlight, false);
			 });
		</script>

	</main>
<?php get_footer(); ?>