<?php

function getBookingSideBar(){
    $img = get_template_directory_uri() . '/assets/images/lake.jpg';

    echo "
	<div class='relative-wrapper'>
		<div class='booking-side-bar'>
			<div class='booking-button-wrapper above-booking-button'>
				<a class='booking-button' href='http://rentals.newmeloneslakemarina.com/'>BOOK NOW</a>
			</div>
		</div>
		<div class='below-booking-button-2'>
			<a class='booking-button' href='http://rentals.newmeloneslakemarina.com/'>BOOK NOW</a>
		</div>
	</div>";
}