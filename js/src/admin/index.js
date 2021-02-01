app.initializers.add('sic-public-tag', function(app) {
    app.extensionData
        .for('oxid-support-sic-public-tag')
        .registerSetting(
            {
                setting: 'sic-public-tag.tag-id',
                type: 'number',
                label: 'ID of the public tag',
            },
        )
});
