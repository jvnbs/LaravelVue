import { createRouter, createWebHistory } from 'vue-router';

// Import Vue components
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import News from './pages/News.vue';
import Contact from './pages/Contact.vue';
import Faq from './pages/Faq.vue';
import Testimonial from './pages/Testimonial.vue';
import TermsCondition from './pages/TermsCondition.vue';
import PrivacyPolicy from './pages/PrivacyPolicy.vue';
import NotFound from './pages/NotFound.vue';

import SignIn from './auth/SignIn.vue';
import SignUp from './auth/SignUp.vue';

import DashboardLayout from './dashboard/DashboardLayout.vue';
import Dashboard from './dashboard/Dashboard.vue';
import Review from './dashboard/Review.vue';
import Favorite from './dashboard/Favorite.vue';
import Setting from './dashboard/Setting.vue';
import Security from './dashboard/Security.vue';

import TicketLayout from './tickets/TicketLayout.vue';
import TicketList from './tickets/Ticket.vue';
import TicketCreate from './tickets/TicketCreate.vue';
import TicketDetail from './tickets/TicketDetail.vue';

import BlogDetail from './pages/BlogDetail.vue';
import NewsDetail from './pages/NewsDetail.vue';

const routes = [
    { path: '/sign-up', name: 'SignUp', component: SignUp },
    { path: '/sign-in', name: 'SignIn', component: SignIn },

    { path: '/', name: 'Home', component: Home },
    { path: '/about', name: 'About', component: About },
    { path: '/blogs', name: 'Blogs', component: Blog },
    { path: '/blog-detail/:id', name: 'BlogDetail', component: BlogDetail, props: true }, 
    { path: '/news', name: 'News', component: News },
    { path: '/news-detail/:id', name: 'NewsDetail', component: NewsDetail, props: true }, 
    { path: '/contact-us', name: 'Contact', component: Contact },
    { path: '/faq', name: 'Faq', component: Faq },
    { path: '/testimonials', name: 'Testimonials', component: Testimonial },
    { path: '/terms-conditions', name: 'TermsConditions', component: TermsCondition },
    { path: '/privacy-policy', name: 'PrivacyPolicy', component: PrivacyPolicy },

    // Dashboard with nested routes
    {
        path: '/dashboard',
        component: DashboardLayout,
        children: [
            { path: '', name: 'Dashboard', component: Dashboard },
            { path: 'reviews', name: 'Reviews', component: Review },
            { path: 'favorites', name: 'Favorite', component: Favorite },
            { path: 'settings', name: 'Settings', component: Setting },
            { path: 'security', name: 'Security', component: Security },
        ]
    },

    // Tickets with nested routes
    {
        path: "/tickets",
        component: TicketLayout,
        children: [
          { path: "", name: "TicketList", component: TicketList },
          { path: "create", name: "TicketCreate", component: TicketCreate },
          { path: "detail/:id", name: "TicketDetail", component: TicketDetail, props: true },
        ],
    },

    { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
