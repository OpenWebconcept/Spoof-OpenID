<?php

use OWC\SpoofOpenId\Settings;

?>

<div class="wrap">
	<h1><?php esc_html_e('Signicat Simulator', 'owc-signicat-openid'); ?></h1>

    <p>Nog geen Signicat aansluiting gerealiseerd? Worry no more! Met de <em>Signicat Simulator 2000™</em> kun je net doen alsof je ingelogd bent op DigiD of eHerkenning!</p>

	<form method="post" action="options.php">
		<?php settings_fields('owc_spoof_openid'); ?>
		<?php do_settings_sections('owc_spoof_openid'); ?>
		<table class="form-table">
            <tr>
				<th scope="row">
					<label for="owc_spoof_openid_enable_simulator">
						Simulator
					</label>
				</th>
				<td>
                    <label class="block-label">
                        <input type="radio" name="owc_spoof_openid_enable_simulator" <?php checked($this->settings->isEnabled(), false); ?> value="off">
                        Uitgeschakeld
                    </label>
                    <label class="block-label">
                        <input type="radio" name="owc_spoof_openid_enable_simulator" <?php checked($this->settings->isDigiDEnabled()); ?> value="<?= Settings::SIMULATOR_DIGID; ?>">
                        DigiD
                    </label>
                    <label class="block-label">
                        <input type="radio" name="owc_spoof_openid_enable_simulator" <?php checked($this->settings->isEHerkenningEnabled()); ?> value="<?= Settings::SIMULATOR_EHERKENNING; ?>">
                        eHerkenning
                    </label>
				</td>
			</tr>

            <tr>
				<th scope="row">
					<label for="owc_spoof_openid_userlevel">
						Activeren voor
					</label>
				</th>
				<td>
                    <label class="block-label">
                    <input type="radio" name="owc_spoof_openid_userlevel" <?php checked($this->settings->enabledForAdministrators()); ?> value="<?= Settings::USERLEVEL_ADMINISTRATOR; ?>">
                        WordPress Administrators (standaard)
                    </label>
                    <label class="block-label">
                        <input type="radio" name="owc_spoof_openid_userlevel" <?php checked($this->settings->enabledForUsers()); ?> value="<?= Settings::USERLEVEL_USER; ?>">
                        Alle ingelogde WordPress gebruikers
                    </label>
                    <label class="block-label">
                        <input type="radio" name="owc_spoof_openid_userlevel" <?php checked($this->settings->enabledForGuests()); ?> value="<?= Settings::USERLEVEL_GUEST; ?>">
                        Bezoekers & ingelogde WordPress gebruikers
                    </label>
				</td>
			</tr>
            
            <tr>
				<th scope="row">
					<label for="owc_spoof_openid_bsn">
						<?php esc_html_e('BSN-nummer', 'owc-signicat-openid'); ?>
					</label>
				</th>
				<td>
					<input type="number" min="0" name="owc_spoof_openid_bsn" id="owc_spoof_openid_bsn" value="<?php echo esc_attr($this->settings->getBsn()); ?>">
				</td>
			</tr>

            <tr>
				<th scope="row">
					<label for="owc_spoof_openid_kvk">
						<?php esc_html_e('KvK-nummer', 'owc-signicat-openid'); ?>
					</label>
				</th>
				<td>
					<input type="number" min="0" name="owc_spoof_openid_kvk" id="owc_spoof_openid_kvk" value="<?php echo esc_attr($this->settings->getKvk()); ?>">
				</td>
			</tr>

		</table>
		<?php submit_button(); ?>
	</form>
</div>

<style>
    .block-label {
        display: block;
        padding: 0.3em 0;
    }
</style>