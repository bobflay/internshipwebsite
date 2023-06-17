Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'exams',
      path: '/exams',
      component: require('./components/Tool').default,
    },
  ])
})
