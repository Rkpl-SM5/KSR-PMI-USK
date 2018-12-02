<!-- Content -->
<div class="content">
		<!-- Animated -->
		<div class="animated fadeIn">
				<!-- Widgets  -->

					<?php
						if (isset($page_content)) {
							$this->load->view($page_content);
						}
					?>
		</div>
</div>
