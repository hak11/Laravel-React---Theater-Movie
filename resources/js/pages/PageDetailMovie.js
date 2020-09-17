import React from 'react';
import ReactDOM from 'react-dom';
import moment from 'moment';
import { times } from 'lodash';

export default class PageDetailMovie extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      loading: false,
      id: null,
      city: '',
      detailMovie: {}
    }
  }

  componentDidMount() {
    const { id, city } = this.props.match.params;

    this.setState({
      id,
      city
    })

    const dataNow = moment().format('YYYY-MM-DD');
    this.getDetailMovie({
      id,
      city,
      movieStart: dataNow
    })
  }

  getDetailMovie(params) {
    this.setState({
      loading: true
    })
    axios.post('/api/movie/' + params.id, params).then(response => {
      this.setState({
        detailMovie: response.data,
        loading: false
      })
    })
  }

  _cardMovie() {
    return (
      <div className="card">
        <div className="row no-gutters">
          <div className="col-auto">
            <img src={this.state.detailMovie.image} className="img-fluid" />
          </div>
          <div className="col">
            <div className="card-block px-2 p-4">
              <h4 className="card-title font-weight-bold">{ this.state.detailMovie.title } ({this.state.detailMovie.duration})</h4>
              <hr />
              <p className="card-text">{this.state.detailMovie.description }</p>
            </div>
          </div>
        </div>
      </div>
    )
  }

  _cardSchedule() {
    if (this.state.detailMovie && this.state.detailMovie.schedule) {
      return this.state.detailMovie.schedule.map((item, key) => {
        return (
          <div className="col-sm-4" key={key}>
              <div className="card">
              <a href={ "/scheduleDetail/"+item.id } className="black text-dark text-decoration-none">
                <div className="card-body">
                  <h5 className="card-title font-weight-bold">{item.theater.name}</h5>
                  <h6 className="card-text">
                      Schedule Time : <br />
                      <span className="text-muted font-weight-light">{item.start}</span>
                  </h6>
                  <h6 className="card-text">
                      City : <br />
                      <span className="text-muted font-weight-light">{item.theater.city}</span>
                  </h6>
                  <h6 className="card-text">
                      Address : <br />
        <span className="text-muted font-weight-light">{item.theater.location}</span>
                  </h6>
                </div>
                <div className="card-footer">
                  <div className="row">
                    <small className="col-md-6 text-muted mt-1">
                      <span className="fa fa-user" />
                      &nbsp; {item.max_seat - item.booked_seat} / {item.max_seat }
                    </small>
                    <span className="col-md-6 text-right">
                      <button className="btn btn-sm btn-primary m-0">Show Seats</button>
                    </span>
                  </div>
                </div>
              </a>
              </div>
          </div>
        )
      })
    }

    if (!this.state.loading) {
      return (
        <div className="col-md-12">
          <h1 className="text-center">
            Schedule Not Available
          </h1>
        </div>
      )
    }
  }

  render() {
    return (
      <div className="container mt-4">
        { this._cardMovie() }
        <hr className="divider" />
        <div className="row">
          { this._cardSchedule() }
        </div>
      </div>
    )
  }
}

if (document.getElementById('pageDetailMovie')) {
  ReactDOM.render(<PageDetailMovie />, document.getElementById('pageDetailMovie'));
}
