var app = new Vue({
    el: '#review-form',
    data: {
        currentRatingConvenience: null,
        currentRatingFunctions: null,
        currentRatingSupport: null,
        ratings: [1, 2, 3, 4, 5]
    },
    methods: {
        setRating(rating,nameRating) {
            this[nameRating] = rating;
        },
        getClass(rating, nameRating) {
            if (this[nameRating] < rating) return "fa fa-star-o fa-3x";
            else return "fa fa-star fa-3x";
        },

    }
})