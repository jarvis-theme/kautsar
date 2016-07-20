<div class="subscribe">
	<div class="col-sm-6">
		<div style="margin-left: 30px; padding: 15px 20px;">
			<h3><i class="fa fa-envelope"></i>&nbsp;&nbsp;Join Our Mailing List and Get Special Offers</h3>
		</div>
	</div>
	<div class="col-sm-6">
		<form action="{{@$mailing->action}}" method="post" class="form-subscribe" target="_blank">
			<div class="form-group">
				<input type="text" name="email" class="email-field" placeholder="Your Email" name="EMAIL" class="input-medium required email" id="newsletter mce-EMAIL" {{ @$mailing->action==''?'disabled="disabled"':'' }} >
				<button class="btn-subscribe" type="submit" {{ @$mailing->action==''?'disabled="disabled" style="opacity: 0.5; cursor: default;"':'' }}>Subscribe</button>
			</div>
		</form>
	</div>
</div>