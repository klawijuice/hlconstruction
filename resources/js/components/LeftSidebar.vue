<template>
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" :href="route('admin.pages.dashboard')">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <div class="accordion" id="accordionExample">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <inertia-link
                                    :href="route('admin.pages.dashboard')"
                                    class="nav-link" :class="{'active':currentPage('admin.pages.dashboard')}"
                                    data-toggle="collapse"
                                    data-target="#link-dashboard"
                                    aria-expanded="false"
                                    aria-controls="link-dashboard"
                                ><i class="fa fa-fw fa-user-circle"></i>
                                    Dashboard
                                </inertia-link>

                                <div id="link-dashboard"
                                        class="collapse"
                                        data-parent="#accordionExample">
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"
                                    :class="{'active' :currentPage('admin.products.index', 'admin.products.online','admin.products.create', 'admin.products.offline', 'admin.products.drafts')}"
                                    data-toggle="collapse"
                                    aria-expanded="false"
                                    data-target="#link-product"
                                    aria-controls="link-product"
                                >
                                    <i class="fas fa-fw fa-newspaper"></i>
                                    Produits
                                </a>
                                <div
                                    id="link-product"
                                    class="collapse submenu"
                                    data-parent="#accordionExample"
                                >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <inertia-link
                                                class="nav-link"
                                                :href="route('admin.products.index')"
                                                :class="{'active' :currentPage('admin.products.index')}">
                                                Liste
                                            </inertia-link>
                                        </li>
                                        <li class="nav-item">
                                            <inertia-link
                                                class="nav-link"
                                                :href="route('admin.products.create')"
                                                :class="{'active' :currentPage('admin.products.create')}">
                                                Créer
                                            </inertia-link>
                                        </li>
                                        <li class="nav-item">
                                            <inertia-link class="nav-link"
                                                            :href="route('admin.products.online')"
                                                            :class="{'active' :currentPage('admin.products.online')}">En ligne
                                            </inertia-link>
                                        </li>
                                        <li class="nav-item">
                                            <inertia-link class="nav-link"
                                                            :href="route('admin.products.offline')"
                                                            :class="{'active' :currentPage('admin.products.offline')}"
                                            >
                                                Hors ligne
                                            </inertia-link>
                                        </li>
                                        <li class="nav-item">
                                            <inertia-link class="nav-link"
                                                            :href="route('admin.products.drafts')"
                                                            :class="{'active' :currentPage('admin.products.drafts')}"
                                            >
                                                Brouillons
                                            </inertia-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"
                                    :class="{'active' :currentPage('admin.posts.index', 'admin.posts.online','admin.posts.create', 'admin.posts.offline', 'admin.posts.drafts')}"
                                    data-toggle="collapse"
                                    aria-expanded="false"
                                    data-target="#link-article"
                                    aria-controls="link-article"
                                >
                                    <i class="fas fa-fw fa-newspaper"></i>
                                    Articles
                                </a>
                                <div
                                    id="link-article"
                                    class="collapse submenu"
                                    data-parent="#accordionExample"
                                >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <inertia-link
                                                class="nav-link"
                                                :href="route('admin.posts.index')"
                                                :class="{'active' :currentPage('admin.posts.index')}">
                                                Liste
                                            </inertia-link>
                                        </li>
                                        <li class="nav-item">
                                            <inertia-link
                                                class="nav-link"
                                                :href="route('admin.posts.create')"
                                                :class="{'active' :currentPage('admin.posts.create')}">
                                                Créer
                                            </inertia-link>
                                        </li>
                                        <li class="nav-item">
                                            <inertia-link class="nav-link"
                                                            :href="route('admin.posts.online')"
                                                            :class="{'active' :currentPage('admin.posts.online')}">En ligne
                                            </inertia-link>
                                        </li>
                                        <li class="nav-item">
                                            <inertia-link class="nav-link"
                                                            :href="route('admin.posts.offline')"
                                                            :class="{'active' :currentPage('admin.posts.offline')}">
                                                Hors ligne
                                            </inertia-link>
                                        </li>
                                        <li class="nav-item">
                                            <inertia-link class="nav-link"
                                                        :href="route('admin.posts.drafts')"
                                                        :class="{'active' :currentPage('admin.posts.drafts')}">
                                                Brouillons
                                            </inertia-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link"
                                    :class="{'active' :currentPage('admin.categories.index')}"
                                    href="#"
                                    data-toggle="collapse"
                                    aria-expanded="false"
                                    data-target="#link-category"
                                    aria-controls="link-category">
                                    <i class="fas fa-fw fa-object-group"></i>
                                    Categories
                                </a>
                                <div id="link-category"
                                        class="collapse submenu"
                                        data-parent="#accordionExample"
                                >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <inertia-link class="nav-link"
                                                            :href="route('admin.categories.index')"
                                                            :class="{'active' :currentPage('admin.categories.index')}"
                                            >Categories
                                            </inertia-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    :class="{'active' :currentPage('admin.faq.index','admin.faq.create')}"
                                    href="#"
                                    data-toggle="collapse"
                                    aria-expanded="false"
                                    data-target="#link-faq"
                                    aria-controls="link-faq">
                                    <i class="fas fa-fw fa-question"></i>
                                    F.A.Q
                                </a>
                                <div id="link-faq"
                                        class="collapse submenu"
                                        data-parent="#accordionExample"
                                >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <inertia-link class="nav-link"
                                                            :href="route('admin.faq.index')"
                                                            :class="{'active' :currentPage('admin.faq.index')}"
                                            >Faqs
                                            </inertia-link>
                                        </li>
                                        <li class="nav-item">
                                            <inertia-link class="nav-link"
                                                            :href="route('admin.faq.create')"
                                                            :class="{'active' :currentPage('admin.faq.create')}"
                                            >creer une F.A.Q
                                            </inertia-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</template>
<script>
import JetNavLink from './../Jetstream/NavLink'

export default {
    components: {
        JetNavLink,
    },
    props: {
        url: String
    },
    data() {
        return {
            activeLink: false
        }
    },
    methods: {
        currentPage(...names) {
            for (let i = 0; i < names.length; i++) {
                const element = route(names[i]);
                if (element == this.url) {
                    return true;
                }

            }
        },

    },
}
</script>
