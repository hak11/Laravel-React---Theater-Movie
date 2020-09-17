import React from 'react';
import ReactDOM from 'react-dom';
import moment from 'moment';

export default class PageScheduleDetail extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      loading: false,
      id: null,
      max_seat: 0,
      booked_seat: 0,
      detailMovie: {},
      detailScreen: {},
      detailTheater: {},
      seats: [],
      start: '',
      end: '',
    }
  }

  componentDidMount() {
    const { id } = this.props.match.params;

    this.setState({
      id,
    })

    const dataNow = moment().format('YYYY-MM-DD');
    this.getDetailSchedule({
      id,
      movieStart: dataNow
    })
  }

  getDetailSchedule(params) {
    this.setState({
      loading: true
    })
    axios.get('/api/schedule/' + params.id).then(response => {
      this.setState({
        detailScreen: response.data.screen,
        detailMovie: response.data.movie,
        detailTheater: response.data.theater,
        seats: response.data.seat,
        max_seat: response.data.max_seat,
        booked_seat: response.data.booked_seat,
        start: response.data.start,
        end: response.data.end,
        loading: false
      })
    })
  }

  _cardMovie() {
    return (
      <div className="card ml-2 mr-2">
        <div className="row no-gutters">
          <div className="col-auto">
            <img src={this.state.detailMovie.image} className="img-fluid" />
          </div>
          <div className="col">
            <div className="card-block px-2 pt-4 pl-4 pr-4">
              <h4 className="card-title font-weight-bold">{this.state.detailMovie.title} ({this.state.detailMovie.duration})</h4>
              <hr />
              <p className="card-text">
                {this.state.detailMovie.description}
              </p>
            </div>
          </div>
        </div>
      </div>
    )
  }

  _seatCol(col) {
    return col.map((item, key) => {
      const statusSeats = item ? 'seats' : 'seats-active'
      return <td key={key}>
        <div className={statusSeats}></div>
      </td>
    });
  }

  _seatsRow() {
    return this.state.seats.map((row, key) => {
      return (
        <tr key={key}>
          {this._seatCol(row)}
        </tr>
      )
    });
  }

  render() {
    return (
      <div className="container mt-4">
        {this._cardMovie()}
        <div className="row mt-4 ml-2 mr-2">
          <div className="col-md-4">
            <div className="card">
              <div className="card-body">
                <h5 className="card-title font-weight-bold">{this.state.detailTheater.name}</h5>
                <h6 className="card-text">
                  Schedule Time : <br />
                  <span className="text-muted font-weight-light">{this.state.start}</span>
                </h6>
                <h6 className="card-text">
                  City : <br />
                  <span className="text-muted font-weight-light">{this.state.detailTheater.city}</span>
                </h6>
                <h6 className="card-text">
                  Address : <br />
                  <span className="text-muted font-weight-light">{this.state.detailTheater.location}</span>
                </h6>
              </div>
              <div className="card-footer">
                <div className="row">
                  <small className="col-md-6 text-muted mt-1">
                    <span className="fa fa-user" />
                    &nbsp; {this.state.max_seat - this.state.booked_seat} / {this.state.max_seat}
                  </small>
                </div>
              </div>
            </div>
          </div>
          <div className="colmd-8">
            <div className="card ml-2 mr-2">
              <div className="card-body">
                <h5 className="card-title">Seats</h5>
                <table className="table table-bordered">
                  <tbody>
                    <tr className="table-active">
                    <td className="text-center">
                      screen
                    </td>
                  </tr>
                  </tbody>
                </table>
                <table className="table table-border">
                  <tbody>
                    { this._seatsRow() }
                  </tbody>
                </table>

                <hr />

                <table className="table table-borderless">
                  <tbody>
                    <tr>
                      <td max-width="10"><div className="seats"></div></td>
                      <td>: Available</td>
                    </tr>
                    <tr>
                      <td><div className="seats-active"></div></td>
                      <td>: Not Available / Booked</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

if (document.getElementById('pageScheduleDetail')) {
  ReactDOM.render(<PageScheduleDetail />, document.getElementById('pageScheduleDetail'));
}
