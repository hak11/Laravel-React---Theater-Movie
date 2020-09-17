import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import PageHome from '../pages/PageHome'
import PageDetailMovie from '../pages/PageDetailMovie'
import PageSchedule from '../pages/PageSchedule'

class App extends Component {
  render() {
    return (
      <BrowserRouter>
        <div>
          <Switch>
            <Route exact path='/' component={PageHome} />
            <Route exact path='/movieDetail/:id/:city' component={PageDetailMovie} />
            <Route exact path='/scheduleDetail/:id' component={PageSchedule} />
          </Switch>
        </div>
      </BrowserRouter>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('app'))
