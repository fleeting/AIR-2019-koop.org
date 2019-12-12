<?php
/*
Template Name: Programs Overview
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container" role="main">
        <?php
				$time = [
					'Overnight to 8am' => [], '8am' => [], '9am' => [], '10am' => [],
					'11am' => [], '12pm' => [], '1pm' => [], '2pm' => [], '3pm' => [],
					'4pm' => [], '5pm' => [], '6pm' => [], '7pm' => [], '8pm' => [],
					'9pm' => [], '10pm' => [], '11pm' => []
				];
        $days = [
					'Sun' => $time,
					'Mon' => $time,
					'Tue' => $time,
					'Wed' => $time,
					'Thu' => $time,
					'Fri' => $time,
					'Sat' => $time
				];

				$programs = new WP_Query([
					'post_type'   => 'programs'
				]);

				if($programs->have_posts()) {
					while($programs->have_posts()) { $programs->the_post();
						$program_timeslots = get_field('show_schedule');
						$data = [
							'title' => $post->post_title,
							'url' => get_permalink($post),
							'time' => '',
							'star' => ''
						];

						foreach($program_timeslots as $slot) {
							$added = false;
							// Using a single date to not deal with DST
							$start = DateTime::createFromFormat('Y-m-d g:i a', '2019-12-12 '.$slot['start_time']);
							if($slot['end_time'] !== '12:00 am') {
								$end = DateTime::createFromFormat('Y-m-d g:i a', '2019-12-12 '.$slot['end_time']);
							} else {
								$end = DateTime::createFromFormat('Y-m-d g:i a', '2019-12-13 '.$slot['end_time']);
							}

							// Format starting string
							$start_string = $start->format('ga');
							if($start->format('i') !== '00') {
								$start_string = $start->format('g:ia');
							}
							if($slot['start_time'] === '12:00 am') {
								$start_string = 'Overnight';
							}

							// Format ending string
							$end_string = $end->format('ga');
							if($end->format('i') !== '00') {
								$end_string = $end->format('g:ia');
							}
							if($slot['end_time'] === '12:00 am') {
								$end_string = 'Overnight';
							}

							$data['start'] = $start;
							$data['time'] = $start_string . ' - ' . $end_string;

							// Check for midnight to 8am
							$span_start = DateTime::createFromFormat('Y-m-d G:i', '2019-12-12 0:00');
							$span_end = DateTime::createFromFormat('Y-m-d G:i', '2019-12-12 8:00');

							if($start < $span_end && $end > $span_start) {
								$added = true;
								$days[$slot['day']]['Overnight to 8am'][] = $data;
							}

							// Check other time slots
							for($i=8;$i<24;$i++) {
								$span_start = DateTime::createFromFormat('Y-m-d G:i', '2019-12-12 '.$i.':00');
								$span_end = clone $span_start;
								$span_end->add(new DateInterval('PT1H'));

								if($start < $span_end && $end > $span_start && !$added) {
									$added = true;
									$days[$slot['day']][$span_start->format('ga')][] = $data;
								}
							}
						}
					}
				}
        ?>
				<table class="programs-schedule">
					<thead>
						<tr>
							<th>&nbsp;</th>
							<?php foreach($days as $day => $slots): ?>
								<th class="<?php if(date('D') === $day) { ?>active-day<?php } ?>"><?= $day ?></th>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($time as $time_text => $row): ?>
							<tr>
								<td class="schedule-cell schedule-time-slot"><?= $time_text ?></td>
								<?php foreach($days as $day => $programs): ?>
									<td class="schedule-cell<?php if(date('D') === $day) { ?> active-day<?php } ?>">
										<?php
										usort($days[$day][$time_text], function($a, $b) {
											return $a['start'] <=> $b['start'];
										});

										foreach($days[$day][$time_text] as $program): ?>
											<p><a href="<?= $program['url'] ?>"><?= $program['title'] ?></a><br>
											<?= $program['time'] ?></p>
										<?php endforeach; ?>
									</td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
