
<div class="wrap">

	<h2><?php _e( 'Redis Object Cache', 'redis-cache' ); ?></h2>

	<?php settings_errors(); ?>

	<table class="form-table">

		<tr valign="top">
			<th scope="row"><?php _e( 'Object Cache Status', 'redis-cache' ); ?></th>
			<td><code><?php echo $this->get_redis_status(); ?></code></td>
		</tr>

		<tr valign="top">
			<th scope="row"><?php _e( 'Connection Parameters', 'redis-cache' ); ?></th>
			<td>
				<p>
					<?php _e( 'Protocol:', 'redis-cache' ); ?> <code><?php echo strtoupper( esc_html( $this->get_redis_scheme() ) ); ?></code><br />
					<?php _e( 'Host:', 'redis-cache' ); ?> <code><?php echo esc_html( $this->get_redis_host() ); ?></code><br />
					<?php _e( 'Port:', 'redis-cache' ); ?> <code><?php echo esc_html( $this->get_redis_port() ); ?></code><br />
					<?php _e( 'Database:', 'redis-cache' ); ?> <code><?php echo esc_html( $this->get_redis_database() ); ?></code><br />
					<?php if ( ! is_null( $this->get_redis_password() ) ) : ?>
						<?php _e( 'Password:', 'redis-cache' ); ?> <code><?php echo str_repeat( '*', strlen( $this->get_redis_password() ) ); ?></code>
					<?php endif; ?>
				</p>
			</td>
		</tr>

	</table>

	<p class="submit">
		<?php if ( ! $this->object_cache_dropin_exists() ) : ?>
			<a href="<?php echo wp_nonce_url( admin_url( add_query_arg( 'action', 'enable-cache', $this->admin_page ) ), 'enable-cache' ); ?>" class="button button-primary button-large"><?php _e( 'Enable Object Cache', 'redis-cache' ); ?></a>
		<?php elseif ( $this->validate_object_cache_dropin() ) : ?>
			<a href="<?php echo wp_nonce_url( admin_url( add_query_arg( 'action', 'disable-cache', $this->admin_page ) ), 'disable-cache' ); ?>" class="button button-secondary button-large"><?php _e( 'Disable Object Cache', 'redis-cache' ); ?></a>
		<?php endif; ?>
	</p>

</div>
