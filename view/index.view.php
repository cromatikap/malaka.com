<main class="container-fluid">
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<table>
				<thead>
					<tr>
						<th colspan="4">Masculine</th>
					</tr>
				</thead>
				<tr>
					<th colspan="2">Singular</th>
					<th colspan="2">Plural</th>
				</tr>
				<tr>
					<?php for($i=0 ; $i<2 ; $i++): ?>
						<th>Nominative</th>
						<th>Accusative</th>
					<?php endfor; ?>
				</tr>
				<tbody>
					<tr>
						<td>ο</td>
						<td>τον</td>
						<td>οι</td>
						<td>τους</td>
					</tr>
					<tr>
						<td>-ας</td>
						<td>-α</td>
						<td colspan="2" rowspan="2">-ες</td>
					</tr>
					<tr>
						<td>-ης</td>
						<td>-η</td>
					</tr>
					<tr>
						<td>-ος</td>
						<td>-ο</td>
						<td>-οι</td>
						<td>-ους</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-lg-4 col-md-6 col-sm-12">
			<table>
				<thead>
					<tr>
						<th colspan="4">Feminine</th>
					</tr>
				</thead>
				<tr>
					<th colspan="2">Singular</th>
					<th colspan="2">Plural</th>
				</tr>
				<tr>
					<?php for($i=0 ; $i<2 ; $i++): ?>
						<th>Nominative</th>
						<th>Accusative</th>
					<?php endfor; ?>
				</tr>
				<tbody>
					<tr>
						<td>η</td>
						<td>την</td>
						<td>οι</td>
						<td>τις</td>
					</tr>
					<tr>
						<td colspan="2">-α</td>
						<td style="border: 0px"></td>
						<td rowspan="2" style="border: 0px">-ες</td>
					</tr>
					<tr>
						<td colspan="2">-η</td>
						<td style="border: 0px"><div class="suffix-eic">-εις</div></td>
					</tr>
					<tr>
						<td>-ος</td>
						<td>-ο</td>
						<td>-οι</td>
						<td>-ους</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-lg-4 col-md-6 col-sm-12">
			<table>
				<thead>
					<tr>
						<th colspan="4">Neutral</th>
					</tr>
				</thead>
				<tr>
					<th colspan="2">Singular</th>
					<th colspan="2">Plural</th>
				</tr>
				<tr>
					<?php for($i=0 ; $i<2 ; $i++): ?>
						<th>Nominative</th>
						<th>Accusative</th>
					<?php endfor; ?>
				</tr>
				<tbody>
					<tr>
						<td colspan="2">το</td>
						<td colspan="2">τα</td>
					</tr>
					<tr>
						<td colspan="2">-ο</td>
						<td colspan="2">-α</td>
					</tr>
					<tr>
						<td colspan="2">-ι</td>
						<td colspan="2">-ια</td>
					</tr>
					<tr>
						<td colspan="2">-μα</td>
						<td colspan="2">-ματα</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</main>