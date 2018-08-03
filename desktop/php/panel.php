<?php
if (!isConnect()) {
	throw new Exception('{{401 - Accès non autorisé}}');
}
sendVarToJs('jeedomBackgroundImg', 'plugins/gsl/core/img/panel.jpg');
?>
    <br/>
    <div class="col-lg-12 col-md-12 col-sm-12" id="div_displayObject">
        <br/>
		<?php
		echo '<div class="div_displayEquipement" style="width: 100%;">';
		$eqLogic = eqLogic::byLogicalId('global', 'gsl');
		if($eqLogic->getConfiguration('isVisiblePanel',0)) {
			echo $eqLogic->toHtml('dview');
		}
		$gsls = gsl::byType('gsl', true);
		foreach ($gsls as $gsl) {
			if ($gsl->getLogicalId() == 'global') {
				continue;
			}
			if($gsl->getConfiguration('isVisiblePanel',0)) {
				echo $gsl->toHtml('dview');
			}
		}
		echo '</div>';
		sendVarToJs('nbGslWidget', count($gsls));
		?>
    </div>
    </div>
<?php include_file('desktop', 'panel', 'js', 'gsl');?>