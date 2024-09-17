(function ($){
    const filter = {
        category_id: null,
        listEl: null,
        spinner: null,
        order: null,
        get: function(){

            let url = new URL(window.location);
            let params = new URLSearchParams(url.search);
            params.set('ajax', 'products');

            $.ajax({
                type: "GET",
                url: '/?' + params.toString(),
                dataType: 'json',
                data: {
                    category: filter.category_id,
                },
                beforeSend: () => {
                    filter.spinner.addClass('d-flex');
                },
                success: function (response) {
                    filter.listEl.html(response.html);
                    filter.spinner.removeClass('d-flex');
                    filter.modal();
                }
            });
        },
        setUrl: function(){
            let url = new URL(window.location);
            let params = new URLSearchParams(url.search);
            if(filter.category_id) {
                if(filter.category_id === 'all') {
                    params.delete('category');
                }
                else {
                    params.set('category', filter.category_id);
                }
            }
            if(filter.order) {
                if(filter.order === 'none') {
                    params.delete('order');
                }
                else {
                    params.set('order', filter.order);
                }
            }
            let newUrl = params.toString() !== '' ? url.origin + '/?' + params.toString() : url.origin;
            window.history.replaceState({}, document.title, newUrl)
        },
        modal: function(){
            $(document).on('click', '.product-modal-toggle', function(){
                let card = $(this).closest('.card');
                let modal = $('#productModal');
                modal.find('.modal-title').html(card.find('.card-header').html());
                modal.find('.modal-body').html(card.find('.product-content').html());
            });
        },
        init: function(){
            filter.listEl = $('#productsList');
            if(filter.listEl.length) {
                filter.spinner = $('.categories-spinner');
                let list = $('.list-group-item[data-category]');

                list.on('click', function () {
                    list.removeClass('active');
                    $(this).addClass('active');
                    filter.category_id = $(this).data('category');
                    filter.setUrl();
                    filter.get();
                });

                $('#orderProducts').on('change', function(){
                    filter.order = $(this).val();
                    filter.setUrl();
                    filter.get();
                });

                filter.modal();
            }
        }
    }

    $(document).ready(function(){
        filter.init()
    });
})(jQuery)