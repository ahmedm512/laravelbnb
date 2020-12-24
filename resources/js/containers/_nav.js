export default [
  {
    _name: 'CSidebarNav',
    _children: [
      {
        _name: 'CSidebarNavItem',
        name: 'Dashboard',
        to: '/dashboard',
        icon: 'cil-speedometer',
      },
      
      {
        _name: 'CSidebarNavItem',
        name: 'Users Table',
        to: '/users/table',
        icon: 'cil-drop'
      },
      {
        _name: 'CSidebarNavDropdown',
        name: 'Auth',
        route: '/auth',
        icon: 'cil-star',
        items: [
          {
            name: 'Login',
            to: '/auth/login'
          },
          {
            name: 'Register',
            to: '/auth/register',
            badge: {
              color: 'info',
              text: 'NEW USER'
            }
          },
        ]
      },
      {
        _name: 'CSidebarNavDivider',
        _class: 'm-5'
      },
    ]
  }
]