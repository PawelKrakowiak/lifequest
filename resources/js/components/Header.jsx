import React from 'react'
import {Link} from 'react-router-dom'

const Header = () => <nav className='navbar navbar-expand-md navbar-light navbar-laravel'>
    <Link className='navbar-brand' to='/'>Lifequest</Link>
</nav>;

export default Header
