export const ROUTE_API = {
    client: {},
    admin: {
        payment_methods: {
            update_qris: "/admin/payment-methods/qris",
        },
        pricings: {
            index: "/admin/pricings",
            update_pricing: (pricingId) => `/admin/pricings/${pricingId}`,
        },
        bookings: {
            index: "/admin/index",
            update_status: (bookingId) => `/admin/bookings/update/${bookingId}`,
        },
        accounts: {
            index: "/admin/accounts",
            create: "/admin/accounts",
            update: (id) => `/admin/accounts/${id}`,
            delete: (id) => `/admin/accounts/${id}`,
        },
    },
};
