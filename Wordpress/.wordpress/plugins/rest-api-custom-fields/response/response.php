<?php defined( 'ABSPATH' ) or die( 'No direct access allowed' );

add_action('rest_api_init', function () {

	$mainObjectTypes = ['post', 'comment', 'user', 'term'];
	$metaPostTypes = getMetafieldsWithPostTypes();

	foreach ($mainObjectTypes as $mainObjectType) {
		$mainObjectTypeMetaItems = get_option('integromat_api_options_' . $mainObjectType);

		if (!empty($mainObjectTypeMetaItems)) {
			foreach ($mainObjectTypeMetaItems as $metaItemFull => $val) {

				$metaItem = str_replace(IMAPIE_FIELD_PREFIX, '', $metaItemFull);

				if ($mainObjectType == 'post') {
					if (isset($metaPostTypes[$metaItem])) {
						foreach ($metaPostTypes[$metaItem] as $postTypeOfTheMetafield) {
							register_rest_field(
								$postTypeOfTheMetafield,
								$metaItem,
								[
									'get_callback' => function ($object, $fieldName, $request) use ($mainObjectType) {
										return get_metadata($mainObjectType, $object['id'], $fieldName, true);
									}
								]
							);
						}
					}
				} else {
					register_rest_field(
						$mainObjectType,
						$metaItem,
						[
							'get_callback' => function ($object, $fieldName, $request) use ($mainObjectType) {
								return get_metadata($mainObjectType, $object['id'], $fieldName, true);
							}
						]
					);
				}


			}
		}
	}
});


/**
 * Gets all metafields with array of post types it is related to.
 * @return array
 */
function getMetafieldsWithPostTypes()
{
	global $wpdb;
	$query = "
		SELECT
			p.post_type,
			m.meta_key
		FROM ". $wpdb->base_prefix ."postmeta m
		INNER JOIN ". $wpdb->base_prefix ."posts p ON p.ID = m.post_id
		ORDER BY
			post_type,
			meta_key
	";
	$metaItems = $wpdb->get_results($query);

	$out = [];
	if (!empty($metaItems)) {
		foreach ($metaItems as $metaItem) {
			if (!isset($out[$metaItem->meta_key]) || !in_array($metaItem->post_type, $out[$metaItem->meta_key])) {
				$out[$metaItem->meta_key][] = $metaItem->post_type;
			}
	    }
	}
	return $out;
}
