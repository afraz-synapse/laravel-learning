function readImage(input,placeholder) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+placeholder)
                .attr('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    
};