<div class="col-sm-2 col-md-10 my-4">
	<div class="card m-auto event" style="width: 30rem;">
		<div class="card-body">
			<h4 class="card-title"><?php echo $r['name']; ?></h4>
			<p class="card-text"><?php echo $r['description']; ?></p>
			<p class="card-text category"><?php echo $r['category']; ?></p>


			<div style="display: flex; justify-content: space-between; align-items: center;">
				<div style="font-weight: 800;">Starting:
					<span class="date"><?php echo $r['start_date']; ?></span>
				</div>

				

				</div>
			</div>
		</div>
	</div>
</div>