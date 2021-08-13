<template>
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h3 class="mb-2"> <slot name="bigTitle"></slot> </h3>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><inertia-link :href="route('admin.pages.dashboard')" class="breadcrumb-link">Dashboard</inertia-link></li>
                            <li class="breadcrumb-item active" aria-current="page"> <slot name="lv1"></slot> </li>
                            <li class="breadcrumb-item active" aria-current="page" v-show="level2"> <slot name="lv2"></slot> </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
</template>
<script>
export default {
    props:{
        level2:{type:Boolean, default: false},
    },
}
</script>
