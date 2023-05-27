
$('#summernote').summernote({
    tabsize: 2,
    height: 400,
})
$("#hint").summernote({
    height: 400,
    toolbar: false,
    placeholder: 'type with apple, orange, watermelon and lemon',
    hint: {
        words: ['apple', 'orange', 'watermelon', 'lemon'],
        match: /\b(\w{1,})$/,
        search: function (keyword, callback) {
            callback($.grep(this.words, function (item) {
                return item.indexOf(keyword) === 0;
            }));
        }
    }
});
