
<div class="modal fade" id="modalShowCall" role="dialog">
    <div class="modal-dialog modal-lg">
    	<div class="modal-content">
        	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h2 class="modal-title">Thông tin các cuộc gọi</h2>
	        </div>
	        <div class="modal-body">
	        	<div class="form" id="call-info">
					<div class="form" id="call-info">
						<div class="row">
							<div class="col-sm-3 col-sm-offset-2">
								<label class="detail-label">Ngày gọi</label>
							</div>
							<div class="col-sm-3">
								<label class="detail-label">Số điện thoại</label>
							</div>
							<div class="col-sm-4">
								<label class="detail-label">Thời gian gọi</label>
							</div>
						</div>

						
						<?php

						function convertTime($second) {
							$hour = floor($second / 3600);
							$second -= $hour * 3600;
							$minute = floor($second / 60);
							$second -= $minute * 60;
							$time = "";
							$time .= $hour != 0 ? $hour." giờ ": "";
							$time .= $minute != 0 ? $minute." phút ": "";
							$time .= $second != 0 ? $second." giây ": "";

							if ($time == "") 
								$time .= $second;
							return $time;
						}

						foreach ($calls as $call) {
							echo '
							<div class="row thongtin-cuocgoi">
								<div class="col-sm-3 col-sm-offset-2">
									<p class="detail-text thoigiangoi">'.$call['thoigian'].'</p>
								</div>
								<div class="col-sm-3">
									<p class="detail-text sdt">'.$call['sdt'].'</p>
								</div>
								<div class="col-sm-4">
									<p class="detail-text thoiluong">'.convertTime($call['thoiluong']).'</p>
								</div>
							</div>';
						}
						?>
						
					</div>
				</div>
	        </div>
        	<div class="modal-footer">
        		<button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
        	</div>
    	</div>
    </div>
</div>