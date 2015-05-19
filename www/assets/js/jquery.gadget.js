(function ($) {
    $.widget('dashboard.gadget', {
        _create: function () {
            this.url = this.options.url
            this.interval = this.options.interval;
            this.element.load(this.url);
        },

        _init: function () {
            var self = this;
            if (this.interval <= 0) {
                return;
            }

            if (this._timer !== undefined) {
                window.clearInterval(this._timer);
            }

            this._timer = window.setInterval(function () {
                self.element.load(self.url);
            }, this.interval * 1000);
        },

        _destroy: function () {
            if (this._timer !== undefined) {
                window.clearInterval(this._timer);
            }
        }
    });
}(jQuery));
