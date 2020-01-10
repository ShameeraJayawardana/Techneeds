<BarChart
                        // style={graphStyle}
                        data={{
                            labels: ['Impression Count', 'SMS delivered', 'Redeemed'],
                            datasets: [
                                {
                                    data: [20, 45, 28],
                                },
                            ],
                        }}
                        width={Dimensions.get('window').width - 30}
                        height={220}
                        yAxisLabel={'$'}
                        chartConfig={{
                            backgroundColor: '#e26a00',
                            backgroundGradientFrom: '#fb8c00',
                            backgroundGradientTo: '#ffa726',
                            decimalPlaces: 2, // optional, defaults to 2dp
                            color: (opacity = 1) => `rgba(255, 255, 255, ${opacity})`,
                            style: {
                                borderRadius: 16
                            }
                        }}
                    />