import React from 'react';
import ReactDOM from 'react-dom';

export default class PageHome extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      loading: false,
      cityActive: 'JAKARTA',
      carousel: [
        {
          image: 'https://i.picsum.photos/id/1023/1300/500.jpg?hmac=g434V18xnf_sqVcPLDxpHzR0QYLuFIL2HyXbSwqL-GQ',
        },
        {
          image: 'https://i.picsum.photos/id/1024/1300/500.jpg?hmac=zGIFDJH1s7pNni6I9VyaeXxF7L1nrmzktpdLlzoxi18',
        },
        {
          image: 'https://i.picsum.photos/id/1012/1300/500.jpg?hmac=FFiLbtpboWGR2WHd1AxTPkaBvCzC5cpVSDK76jQ-cGQ',
        },
      ],
      listMovie: [],
      listCity: [],
    };

    this.changeCity = this.changeCity.bind(this);
  }

  componentDidMount() {
    axios.get('/api/theater/listOfCity').then(response => {
      this.setState({
        listCity: response.data
      })
    })

    this.getMovies({ city: this.state.cityActive })
  }

  getMovies(params) {
    this.setState({
      loading: true
    })
    axios.post('/api/movies/nowPlaying', params).then(response => {
      this.setState({
        listMovie: response.data,
        loading: false
      })
    })
  }

  changeCity(event) {
    const city = event.target.value;
    this.setState({
      cityActive: city
    })
    this.getMovies({ city })
  }

  _renderCity() {
    if (this.state.listCity.length) {
      return this.state.listCity.map((item, key) => {
        return (
          <option key={key} value={item.city}> {item.city}</option>
        );
      });
    }

    return (
      <option value="">City Not Available</option>
    )
  }

  _renderMovie() {
    if (this.state.listMovie.length) {
      return this.state.listMovie.map((item, key) => {
        return (
          <div className="col-md-4" key={key}>
            <a href={"/movieDetail/" + item.movie_id + "/" +  this.state.cityActive }>
              <div className="card mb-4 shadow-sm">
                <img src={ item.image } className="card-img-top" />
                <div className="card-body">
                  <p className="card-text">{ item.title }</p>
                </div>
              </div>
            </a>
          </div>
        );
      });
    }

    if (!this.state.loading) {
      return (
        <div className="col-md-12">
            <h1 className="text-center">
          Movie Not Available
            </h1>
        </div>
      )
    }
  }

  _renderCarousel() {
    return this.state.carousel.map((item, key) => {
      let classOfActive = "carousel-item";
      if (key === 0) {
        classOfActive = classOfActive+" active"
      }
      return (
        <div className={classOfActive} key={key}>
          <img className="d-block w-100" src={item.image} alt="First slide" />
        </div>
      );
    });
  }

  render() {
    return (
      <div>
          <div id="carouselHome" className="carousel slide" data-ride="carousel">
          <ol className="carousel-indicators">
            <li data-target="#carouselHome" data-slide-to="0" className="active"></li>
            <li data-target="#carouselHome" data-slide-to="1"></li>
            <li data-target="#carouselHome" data-slide-to="2"></li>
          </ol>
          <div className="carousel-inner">
            {this._renderCarousel() }
          </div>
          <a className="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
            <span className="carousel-control-prev-icon" aria-hidden="true"></span>
            <span className="sr-only">Previous</span>
          </a>
          <a className="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
            <span className="carousel-control-next-icon" aria-hidden="true"></span>
            <span className="sr-only">Next</span>
          </a>
        </div>
        <div className="container">
          <div className="row">
            <div className="col-md-4">
              <div className="form-group">
                <label>Select City</label>
                <select className="form-control" value={this.state.cityActive} onChange={(e) => this.changeCity(e)}>
                  {this._renderCity()}
                </select>
              </div>
            </div>
          </div>

          <div className="row mt-4">
            {this._renderMovie()}
          </div>
        </div>
      </div>
    )
  }
}

if (document.getElementById('pageHome')) {
  ReactDOM.render(<PageHome />, document.getElementById('pageHome'));
}
