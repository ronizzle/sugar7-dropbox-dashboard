({
    plugins: ['Dashlet'],

    entries: [],

    loadData: function (options) {
        var self = this;
        return app.api.call('read', app.api.buildURL('dropbox'), null, {
            success: function (data) {
                self.entries = data.entries;
                self.render();
            }
        });
    }
})