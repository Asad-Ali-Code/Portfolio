<?php
get_header();
?>

<section class="blank-page-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="blank-page-table">
					<div class="blank-page-table-cell">
						<ul class="list-inline">
							<li>4</li>
							<li class="diff-color">0</li>
							<li>4</li>
						</ul>


						<?php
							printf('<a href="%s" class="home-page-link">%s</a>', esc_url( home_url('/') ), esc_html('Take me to the Home Page', 'bufet'));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
	get_template_part('footer-clean');
?>
