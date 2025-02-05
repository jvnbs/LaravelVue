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

import Dashboard from './dashboard/Dashboard.vue';
import Review from './dashboard/Review.vue';
import Favorite from './dashboard/Favorite.vue';
import Setting from './dashboard/Setting.vue';
import Security from './dashboard/Security.vue';

import TicketLayout from './dashboard/TicketLayout.vue';
import TicketList from './dashboard/Ticket.vue';
import TicketCreate from './components/TicketCreate.vue';
import TicketDetail from './components/TicketDetail.vue';
import BlogDetail from './pages/BlogDetail.vue';
import NewsDetail from './pages/NewsDetail.vue';

const routes = [
    { path: '/sign-up', component: SignUp },
    { path: '/sign-in', component: SignIn },

    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/blogs', component: Blog },
    { path: '/blog-detail/:id', component: BlogDetail }, 
    { path: '/news', component: News },
    { path: '/news-detail/:id', component: NewsDetail }, 
    { path: '/contact-us', component: Contact },
    { path: '/faq', component: Faq },
    { path: '/testimonials', component: Testimonial },
    { path: '/terms-conditions', component: TermsCondition },
    { path: '/privacy-policy', component: PrivacyPolicy },

    { path: '/dashboard', component: Dashboard },
    {
        path: "/tickets",
        component: TicketLayout, // Parent route
        children: [
          { path: "", name: "TicketList", component: TicketList }, // Default child
          { path: "create", name: "TicketCreate", component: TicketCreate },
          { path: "detail/:id", name: "TicketDetail", component: TicketDetail },
        //   { path: "update/:id", name: "TicketCreate", component: TicketCreate, props: true },
        ],
    },
    { path: '/reviews', component: Review },
    { path: '/favorite', component: Favorite },
    { path: '/settings', component: Setting },
    { path: '/security', component: Security },

    { path: '/:pathMatch(.*)*', component: NotFound }, // Catch-all for 404
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
